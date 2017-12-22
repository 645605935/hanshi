<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class IndexController extends AuthController {

    public function _initialize() {
        parent::_initialize();
        global $user;
        $user=session('auth');
        $this->user=$user;
        $this->cur_c='Index';
    }
    
    /**
     * @cc 列表页
     */
    public function index(){
        global $user;
        
        $this->cur_v='Index-index';
        $this->type=M('Type')->where(array('pid'=>1273))->select();
        $this->display();  
    }

    /**
     * @cc 异步获取用户列表
     */
    public function ajax_get_user_list(){
        $map=array();
        if($_GET['username']){
            $map['username']=array('like','%'.$_GET['username'].'%');
        }
            
        if($_GET['gid']>0){
            $map['gid']=$_GET['gid'];
        }

        $map['id']=array('neq',1);
        $d = D('User');
        $list = $d->where($map)->order('id desc')->relation(true)->select();

        foreach ($list as $key => $value) {
            $list[$key]['register_time']=date('Y-m-d',$value['register_time']);
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
            $data['msg']='empty';
        }
        echo json_encode($data);
    }

    /**
     * @cc 上传图片【不对图进行任何处理】
     */
    public function upload_img(){
        if($_FILES['img']['size']>0){
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
                $img=$info['img']['savename'];
                $data=array();
                $data['code']=0;
                $data['msg']='上传成功';
                $data['data']='/layui/'.$img;
            }

            echo json_encode($data);
        }
    }

    /**
     * @cc 上传图片【生成三种大小的图片】
     */
    public function upload_img_3(){
        global $user;
        $uid=$user['uid'];

        if($_FILES['img']['size']>0){
            $image=new \Common\Extend\Image();
            $img=$image->upload($_FILES['img'],filePath($uid,'layui_3'),'thumb');

            if(!$img) {
                $data=array();
                $data['code']=0;
                $data['msg']=$image->getError();
            }else{
                $data=array();
                $data['code']=0;
                $data['msg']='上传成功';
                $data['data']=$img;
            }

            echo json_encode($data);
        }
    }



    
}