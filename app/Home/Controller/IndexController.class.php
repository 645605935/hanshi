<?php

namespace Home\Controller;
use Think\CommonController;

class IndexController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        $this->display();
    }

    public function shop(){
        global $user;

        $where=array();

        $count      = M('Video')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,10);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Video')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;


        $shop_types=M('Type')->where(array('pid'=>1238))->select();
        foreach ($shop_types as $k1 => $v1) {
            $temp=M('Type')->where(array('pid'=>$v1['id']))->select();
            foreach ($temp as $k2 => $v2) {
                $temp[$k2]['_child']=M('Type')->where(array('pid'=>$v2['id']))->select();
            }
            $shop_types[$k1]['_child']=$temp;
        }

        $this->shop_types=$shop_types;
        $this->display();
    }

    public function yanchu(){
        global $user;

        $where=array();

        $count      = M('Video')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Video')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;

        $this->display();
    }

    public function yanchu_detail(){
        global $user;
        
        $id=$_GET['id'];
        $row=M('Product')->where($where)->find($id);
        $row['images']=explode('#', $row['images']);
        $row['time']=date('Y-m-d',$value['time']);

        $this->row=$row;
        $this->display();
    }

    public function chanpin_detail(){
        global $user;
        
        $id=$_GET['id'];
        $row=M('Product')->where($where)->find($id);
        $row['images']=explode('#', $row['images']);
        $row['time']=date('Y-m-d',$value['time']);

        $this->row=$row;
        $this->display();
    }








    public function ajax_get_city_list(){
        $map=array();
        if($provinceid=$_GET['provinceid']){
            $map['fatherid']=$provinceid;
        }
            
        $list = M('City')->where($map)->order('first_name desc')->select();

        if($list){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$list;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='empty';
        }
        echo json_encode($data);
    }


    public function ajax_get_type_list(){
        $map=array();
        if($type=$_GET['type']){
            $map['pid']=$type;
        }
            
        $list = M('Type')->where($map)->select();

        if($list){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$list;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='empty';
        }
        echo json_encode($data);
    }

    public function ajax_get_autoprice_info(){
        $map=array();
        if($type=$_GET['type']){
            $map['type']=$type;
        }

        $row = M('Autoprice')->where($map)->find();

        if($row){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$row;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='empty';
        }
        echo json_encode($data);
    }

    
    //前端所有上传文件都用这个
    // 上传图片
    public function lay_upload_img(){
        global $user;

        if($user){
            $get_file=$_FILES;
            if($get_file['img']['size']>0||$get_file['img_1']['size']>0||$get_file['img_2']['size']>0||$get_file['sfz_1']['size']>0||$get_file['sfz_2']['size']>0||$get_file['images']['size']>0){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728000 ;// 设置附件上传大小
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
                    if($get_file['img']['size']>0){
                        $img=$info['img']['savename'];
                    }
                    if($get_file['img_1']['size']>0){
                        $img=$info['img_1']['savename'];
                    }
                    if($get_file['img_2']['size']>0){
                        $img=$info['img_2']['savename'];
                    }
                    if($get_file['sfz_1']['size']>0){
                        $img=$info['sfz_1']['savename'];
                    }
                    if($get_file['sfz_2']['size']>0){
                        $img=$info['sfz_2']['savename'];
                    }
                    if($get_file['images']['size']>0){
                        $img=$info['images']['savename'];
                    }

                    $img_url='/Uploads/layui/'.$img;

                    $data=array();
                    $data['code']=0;
                    $data['msg']='success';
                    $data['data']["src"]=$img_url;

                    //上传到阿里云OSS
                    oss_upload( '/Uploads/layui/'.$img );
                }

                echo json_encode($data);
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='请登录';

            echo json_encode($data);
        }

        
    }

    //上传文件
    public function lay_upload_file(){
        global $user;

        if($user){
            if($_FILES['file']['size']>0){
                $upload = new \Think\Upload();// 实例化上传类               
                $upload->maxSize   =     314572800000 ;// 设置附件上传大小
                $upload->exts      =     array('zip', 'rar', 'xls','xlsx', 'doc','docx','ppt','pptx','pdf','jpg','png','jpeg','gif','mp4','mp3','wav','wma');// 设置附件上传类型
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
                    $file=$info['file']['savename'];
                    $file_url='/Uploads/layui/'.$file;

                    $data=array();
                    $data['code']=0;
                    $data['msg']='success';
                    $data['data']["src"]=$file_url;

                    //上传到阿里云OSS
                    oss_upload( './Uploads/layui/'.$file );
                }

                echo json_encode($data);
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='请登录';

            echo json_encode($data);
        }
        
    }


}