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
            if($value['img']){
                $list[$key]['img']="./Uploads/".$value['img'];
            }
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

    //获取单条信息
    public function ajax_get_row_info(){
        $id=I('id');

        if($id){
            $row = M('Tender')->find($id);
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

    //编辑
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

    //添加
    public function ajax_add(){
        global $user;

        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        if($_arr){
            $data=array();
            $data['title']=$_arr['title'];
            $data['content']=$_arr['content'];
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('Tender')->where($where)->add($data);
            if($id){
                $row= M('Tender')->relation(true)->find($id);
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
        $id=I('id'); 

        if($id){
            $res=M('Tender')->where(array('id'=>$id))->delete();

            if($res){
                $data=array();
                $data['code']=0;
                $data['msg']='success';
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


    // 上传文件
    public function lay_upload_file(){
        if($_FILES['UpFile']['size']>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     31457280 ;// 设置附件上传大小
            $upload->exts      =     array('zip', 'rar', 'xls','xlsx', 'doc','docx','ppt','pptx','pdf','jpg','png','jpeg','gif');// 设置附件上传类型
            $upload->uploadReplace  = false;// 存在同名文件是否覆盖
            $upload->autoSub   =     false;//是否启用子目录保存
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'layui/'; // 设置附件上传（子）目录
            $upload->saveRule  =     ''; // 设置附件上传（子）目录
             
            // 上传文件 
            $info   =   $upload->upload();

            if(!$info) {
                $data=array();
                $data['code']=0;
                $data['msg']=$upload->getError();
            }else{
                $img=$info['UpFile']['savename'];
                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']["src"]='http://'.$_SERVER['HTTP_HOST'].'/Uploads/layui/'.$img;
            }

            echo json_encode($data);
        }
    }

}