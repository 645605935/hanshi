<?php

namespace Home\Controller;
use Think\CommonController;

class ApiController extends CommonController{
    public function _initialize(){
        parent::_initialize();
    }

    public function ajax_add_image(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        $image=$_arr['image'];
        $uid=$_arr['uid'];

        $data=array();
        $data['uid']=$uid;
        $data['url']=$image;
        $data['time']=time();

        $id = M('Auiimage')->add($data);
        if($id){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    public function ajax_add_video(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        $video=$_arr['video'];
        $uid=$_arr['uid'];

        $data=array();
        $data['uid']=$uid;
        $data['url']=$video;
        $data['time']=time();

        $id = M('Auivideo')->add($data);
        if($id){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    public function ajax_add_svideo(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        $uid=$_arr['uid'];
        $image=$_arr['image'];
        $video=$_arr['video'];
        $remark=$_arr['remark'];
        

        $data=array();
        $data['uid']=$uid;
        $data['image']=$image;
        $data['video']=$video;
        $data['remark']=$remark;
        $data['time']=time();

        $id = M('Auisvideo')->add($data);
        if($id){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }
         
    public function get_image_list(){
        $config=M('Config')->find(1);
        $_oss_url_='http://'.$config['oss_url'].'/';
        $_oss_style_150x150_=$config['oss_style_150x150'];

        $base_url="http://zhangtengrui.oss-cn-beijing.aliyuncs.com/";

        $where=array();
        // if($_GET['city']){
        //     $where['city']=$_GET['city'];
        // }
        // if($_GET['type']){
        //     $where['type']=$_GET['type'];
        // }
        
        $list = M('Auiimage')->where($where)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['url']=$base_url . $value['url'];
            $list[$key]['url']=$_oss_url_ . $value['url']. "?x-oss-process=" . $_oss_style_150x150_;
        }

        echo json_encode($list);
    }


    // 查找用户-登录
    public function find_user_by_wx_id(){
        // echo json_encode($_GET);die;

        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        $wx_id=$_arr['wx_id'];

        $where=array();
        $where['wx_id']=$wx_id;

        $row = M('user')->where($where)->find();

        if($row){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['user_info']=$row;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    // wx注册用户
    public function wx_register(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);
        // echo json_encode($_arr);die;

        $password=$_arr['password'];
        $username=$_arr['username'];
        $wx_id=$_arr['wx_id'];
        $wx_user_info=$_arr['wx_user_info'];

        $data=array();
        $data['username']=$username;
        $data['password']=$password;
        $data['wx_id']=$wx_id;
        $data['wx_user_info']=$wx_user_info;

        $id=M('user')->add($data);
        $row=M('user')->find($id);

        if($row){
            $data=array();
            $data['code']=0;
            $data['msg']='注册成功';
            $data['user_info']=$row;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='注册失败';
            
        }

        echo json_encode($data);
    }

























}