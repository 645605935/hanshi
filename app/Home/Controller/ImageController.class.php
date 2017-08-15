<?php

namespace Home\Controller;
use Think\CommonController;

class ImageController extends CommonController{
    public function _initialize(){
        parent::_initialize();
    }

    public function ajax_save_data(){
        $_json=file_get_contents('php://input');
        $_arr=json_decode($_json,true);

        $image=$_arr['image'];
        $uid=$_arr['uid'];

        $data=array();
        $data['uid']=$uid;
        $data['image']=$image;
        $data['time']=time();

        $id = M('Image')->add($data);
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
         
























}