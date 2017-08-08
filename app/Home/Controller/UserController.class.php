<?php

namespace Home\Controller;
use Think\CommonController;

class UserController extends CommonController{

    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function book_list(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];

        $count      = D('Book')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,1);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Book')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->display();
    }

    public function book_create(){
        $this->display();
    }

    

    public function book_step_1(){
        $this->display();
    }

    public function book_step_2(){
        $type=M('Type')->where(array('pid'=>1309))->select();
        $type_1=M('Type')->where(array('pid'=>1299))->select();
        $tags=M('Type')->where(array('pid'=>1300))->select();

        $this->type=$type;
        $this->type_1=$type_1;
        $this->tags=$tags;
        $this->display();
    }

    public function book_step_3(){
        $this->display();
    }

    //添加书
    public function ajax_add_book(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $id = M('Book')->add($data);
            if($id){
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

    //添加
    public function ajax_add_juan(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $id = M('BookJuan')->add($data);
            if($id){
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

    //是否可以新建书
    public function ajax_able_create(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['status']=0;

        $res=M('Book')->where($where)->find();
        if(!$res){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='您还有作品未审核！';
        }

        echo json_encode($data);
    }

    

    //编辑
    public function ajax_edit(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();
            $data['start_time']=strtotime($data['start_time']);
            $data['end_time']=strtotime($data['end_time']);

            $res = M('Match')->save($data);
            if($res){
                $id=$data['id'];
                $row= D('Match')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$row['time']);
                $row['start_time']=date('Y-m-d H:i',$row['start_time']);
                $row['end_time']=date('Y-m-d H:i',$row['end_time']);

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
            $res=M('Match')->where(array('id'=>$id))->delete();

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

    public function ajax_get_type_2(){
        $type_1=I('id');

        $type_2 = M('Type')->where(array('pid'=>$type_1))->select();

        if($type_2){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$type_2;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='未搜索到数据';
            $data['data']=array();
        }
        echo json_encode($data);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////


    public function register(){
        $data=array();
        if($data=$_POST){
            $data['username']=$_POST['username'];
            $data['email']=$_POST['email'];
            $data['phone']=$_POST['phone'];
            $data['password']=md5($_POST['password']);
            $data['time']=time();

            $id=M('User')->add($data);
            if($id){
                $row=M('User')->find($id);

                $data=array();
                $data['code']=0;
                $data['msg']='注册成功';
                $data['data']=$row;
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='注册失败';
            }

            echo json_encode($data);
        }
    }

    public function gr_reg(){
        $this->gid=44;
        $this->display();
    }

    public function zf_reg(){
        $this->gid=33;
        $this->display();
    }

    public function qy_reg(){
        $company_type=M('Type')->where(array('pid'=>1290))->select();

        $this->gid=22;
        $this->company_type=$company_type;
        $this->display();
    }

    public function login(){
        if(!$_GET['gr']||$_GET['zf']||$_GET['qy']){
            $this->redirect('Home/User/login', array('gr' => 1));
        }else{
            $this->display();
        }
    }

    public function ajax_login(){
        if($_POST){
            $where=array();
            $where['username']=$_POST['username'];
            $where['password']=md5($_POST['password']);

            $row=M('User')->where($where)->find();
            if($row){
                session('userinfo',$row);

                $data=array();
                $data['code']=0;
                $data['msg']='登录成功';
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='登录失败';
            }

            echo json_encode($data);
        }
    }







  




}