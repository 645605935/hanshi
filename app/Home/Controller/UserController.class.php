<?php

namespace Home\Controller;
use Think\CommonController;

class UserController extends CommonController{

    public function _initialize(){
        parent::_initialize();
    }

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