<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class TenderController extends AuthController {
    
    public function _initialize() {
        parent::_initialize();
        global $user;
        $user=session('auth');
        $this->user=$user;
        $this->cur_c='Tender';

        if($_POST){
            $this->_POST=$_POST;
        }
    }

    public function index(){
        global $user;

        $group=M('auth_group')->where(array('pid'=>0))->select();
        foreach ($group as $key => $value) {
            $group[$key]['_child']=M('auth_group')->where(array('pid'=>$value['id']))->select();
        }
        $this->group=$group;


        $this->cur_v='Tender-index';

        $page="Tender/index";
        $page_buttons=M('PageButtons')->where(array('page'=>$page))->select();
        $this->page_buttons=$page_buttons;
        $this->page=$page;

        
        $this->display();
    }

    //列表
    public function ajax_get_list(){
        $map=array();
        if($_GET['title']){
            $map['title']=array('like','%'.$_GET['title'].'%');
        }

        $d = D('Tender');
        $list = $d->where($map)->order('id desc')->relation(true)->select();

        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            $list[$key]['img']="./Uploads".$value['img'];
        }

        if($list){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$list;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='未搜索到数据';
            $data['data']=array();
        }
        echo json_encode($data);
    }

   
    //根据ID获取用户关联的信息
    public function ajax_get_user_relation_logs(){

        $id=$_GET['id'];
        if($id==0){
            $list = array();
        }else{
            $list = D('Log')->where(array('uid'=>$id))->order('time desc')->select();
        }

        

        echo json_encode($list);
    }

    //根据ID获取用户关联的信息
    public function ajax_get_user_relation_cases(){

        $id=$_GET['id'];
        if($id==0){
            $list = array();
        }else{
            $list = D('Case')->where(array('creater'=>$id))->order('time desc')->select();
        }

        

        echo json_encode($list);
    }

    //根据ID获取用户信息
    public function ajax_get_user_info_by_id(){

        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        if($_arr){
            $id=$_arr['id'];

            $row = D('User')->find($id);
            if($row){
                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']=$row;
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='error';
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    //编辑用户信息
    public function ajax_edit_user(){

        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        if($_arr){
            $id=$_arr['id'];
            $where=array('id'=>$id);

            $data=array();
            $data['truename']=$_arr['truename'];
            $data['username']=$_arr['username'];
            $data['gid']=$_arr['gid'];
            if($_arr['img']!=''){
                //删除原来的图片
                $_old_img = D('User')->where('id='.$id)->getField('img');
                unlink('./Uploads'.$_old_img);

                $data['img']=$_arr['img'];
            }
            

            $res = D('User')->where($where)->save($data);
            $row = D('User')->relation(true)->find($id);
            if($res){
                // 赋权限,如果没有则添加
                if( !$_row_=M('AuthGroupAccess')->where(array('uid'=>$id))->find() ){
                    $ga_data=array();
                    $ga_data['uid']=$id;
                    $ga_data['group_id']=$_arr['gid'];
                    M('AuthGroupAccess')->add($ga_data);
                }else{
                    $ga_data=array();
                    $ga_data['group_id']=$_arr['gid'];
                    M('AuthGroupAccess')->where(array('uid'=>$id))->save($ga_data);
                }

                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']=$row;
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='error';
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    //添加用户信息
    public function ajax_add_user(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        if($_arr){
            $data=array();
            $data['truename']=$_arr['truename'];
            $data['password']=md5($_arr['password']);
            $data['username']=$_arr['username'];
            $data['gid']=$_arr['gid'];
            $data['img']=$_arr['img'];
            $data['time']=time();


            if($id = D('User')->where($where)->add($data)){
                $row= D('User')->relation(true)->find($id);
                if($row){
                    // 赋权限,如果没有则添加
                    $ga_data=array();
                    $ga_data['uid']=$id;
                    $ga_data['group_id']=$_arr['gid'];
                    M('AuthGroupAccess')->add($ga_data);
                    

                    $data=array();
                    $data['code']=0;
                    $data['msg']='success';
                    $data['data']=$row;
                }else{
                    $data=array();
                    $data['code']=1;
                    $data['msg']='error';
                }
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='error';
            }
            
            
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    //删除
    public function ajax_del(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);


        $ids=$_arr['ids']; 

        $ids_arr=explode(',', $ids);

        if(is_array($ids_arr)){
            foreach ($ids_arr as $key => $value) {
                $_uid=$value;
                $_user_info=M('User')->where(array('id'=>$_uid))->find();
                unlink('./Uploads'.$_user_info['img']);
                //删除相关数据表里的数据
                if(M('User')->where(array('id'=>$_uid))->delete()){
                    M('AuthGroupAccess')->where(array('uid'=>$_uid))->delete();
                    unlink($_SERVER['HTTP_ORIGIN'].'/Uploads'.$_user_info);
                }
            }
        }

        $data=array();
        $data['code']=0;
        $data['msg']='success';
        
        echo json_encode($data);
    }
}