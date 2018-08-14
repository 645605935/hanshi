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

        //推荐企业
        $this->companys=M('User')->where(array('recommend'=>1, 'status'=>1, 'gid'=>33))->limit(5)->select();

        //本周热榜
        $this->books_hot=M('Book')->where(array('finish'=>1))->order('collect desc')->limit(4)->select();

        //精彩演出
        $this->videos=M('Video')->where(array('recommend'=>1, 'status'=>1))->limit(3)->select();

        //志愿者活动
        $this->activitys_1=M('Activity')->where(array('type'=>1270, 'recommend'=>1, 'status'=>1))->limit(4)->select();
        //热门活动
        $this->activitys_2=M('Activity')->where(array('type'=>1271, 'recommend'=>1, 'status'=>1))->limit(4)->select();
        //传统文化演出
        $this->activitys_3_recommend=M('Activity')->where(array('type'=>1272, 'recommend'=>1, 'status'=>1))->find();
        $this->activitys_3=M('Activity')->where(array('type'=>1272, 'status'=>1))->limit(4)->select();

        //热卖产品
        $this->products_hot=M('Product')->where(array('recommend'=>1, 'status'=>1))->limit(4)->select();

        $this->ad_focus=M('Ad')->where(array('type'=>1357))->select();
        $this->display();
    }

    //比赛公告
    public function notice(){
        $list_online=D('Baoming')->where(array('sqz'=>1359, 'sq'=>1384, 'bmz'=>1387, 'fusai_status'=>1))->relation(true)->select();
        $list_offline_child=D('Baoming')->where(array('sqz'=>1360, 'sq'=>1392, 'bmz'=>1396, 'fusai_status'=>1))->relation(true)->select();
        $list_offline_man=D('Baoming')->where(array('sqz'=>1360, 'sq'=>1392, 'bmz'=>1397, 'fusai_status'=>1))->relation(true)->select();

        $this->list_online=$list_online;
        $this->list_offline_child=$list_offline_child;
        $this->list_offline_man=$list_offline_man;

        $notice=M('Type')->find(1401);
        $notice['text']=htmlspecialchars($notice['text']);
        $this->notice=$notice;
        $this->display();
    }

    //志愿者报名入口
    public function volunteer_join(){
        $this->display();
    }

    public function ajax_add_volunteer(){
        global $user;

        $data=array();

        $row=M('VolunteerJoin')->where(array('uid'=>$user['id']))->find();

        if(!$row){
            if($data=$_POST){
                $data['time']=time();

                $id=M('VolunteerJoin')->add($data);
                if($id){
                    $data=array();
                    $data['code']=0;
                    $data['msg']='恭喜你成为平台志愿者！';
                }else{
                    $data=array();
                    $data['code']=1;
                    $data['msg']='报名失败';
                }
            }
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='您已报名成功！';
        }
        echo json_encode($data);
        
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


    ////////////////////////////////////////////////////////////////////////////////////////////////////


    public function register(){
        $data=array();
        if($data=$_POST){
            $data['username']=$_POST['username'];
            $data['email']=$_POST['email'];
            $data['phone']=$_POST['phone'];
            $data['password']=md5($_POST['password']);
            $data['time']=time();

            if($_POST['gid']==44){
                $data['status']=1;
            }else{
                $data['status']=0;
            }

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

    public function yindao(){
        $this->display();
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
        global $user;

        $this->display();
    }

    public function ajax_login(){
        if($_SESSION['returnUrl']){
            $returnUrl=$_SESSION['returnUrl'];
        }else{
            $returnUrl="http://".$_SERVER['HTTP_HOST'];
        }



        $map=array();
        $where['username']  = $_POST['username'];
        $where['email']  = $_POST['username'];
        $where['phone']  = $_POST['username'];
        $where['_logic'] = 'or';
        $map['_complex'] = $where;
        $map['gid']=$_POST['gid'];

        $row=M('User')->where($map)->find();
        if($row){

            if($row['password']==md5($_POST['password'])){
                if($row['status']==0){
                    $data=array();
                    $data['code']=1;
                    $data['msg']='请审核通过后再登录';
                    $data['data']=$returnUrl;
                }
                if($row['status']==1){
                    session('userinfo',$row);

                    $data=array();
                    $data['code']=0;
                    $data['msg']='登录成功';
                    $data['data']=$returnUrl;
                }
            }else{
                $data=array();
                $data['code']=2;
                $data['msg']='密码不正确';
                $data['data']=$returnUrl;
            }
        }else{

            $data=array();
            $data['code']=1;
            $data['msg']='此用户名不存在';
            $data['data']=$returnUrl;
        }

        echo json_encode($data);
    }

    public function ajax_check_username_exist(){
        if($_POST){
            $where=array();
            $where['username']=$_POST['username'];

            $row=M('User')->where($where)->find();
            if($row){
                $data=array();
                $data['code']=0;
                $data['msg']='存在！';
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='用户名不存在！';
            }
            echo json_encode($data);
        }
    }

    public function ajax_check_email_exist(){
        global $user;

        if($_POST){
            $where=array();
            $where['email']=$_POST['email'];
            if($user){
                $where['id']=array('neq'=>$user['id']);
            }

            $row=M('User')->where($where)->find();
            if($row){
                $data=array();
                $data['code']=0;
                $data['msg']='存在！';
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='邮箱不存在！';
            }
            echo json_encode($data);
        }
    }

    public function ajax_check_phone_exist(){
        if($_POST){
            $where=array();
            $where['phone']=$_POST['phone'];

            $row=M('User')->where($where)->find();
            if($row){
                $data=array();
                $data['code']=0;
                $data['msg']='存在！';
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='手机号不存在！';
            }
            echo json_encode($data);
        }
    }


    // 找回密码
    public function findpassword_1(){
        global $user;
        $this->display();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function verify_code(){
        $Verify =     new \Think\Verify();
        $Verify->fontSize = 30;
        $Verify->length   = 3;
        $Verify->useNoise = false;
        $Verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        $res=  $verify->check($code, $id);

        if($res){
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

    // 找回密码
    public function findpassword_2(){
        global $user;
        $userinfo=M('User')->where(array('username'=>$_POST['username']))->find();
        $userinfo['phone']=hidtel($userinfo['phone']);
        $this->userinfo=$userinfo;
        $this->display();
    }

    // 找回密码
    public function findpassword_3(){
        global $user;
        $this->display();
    }

    // 找回密码
    public function findpassword_4(){
        global $user;
        $this->display();
    }












    

    
    //前端所有上传文件都用这个
    // 上传图片
    public function lay_upload_img(){
        global $user;

        $get_file=$_FILES;
        if($get_file['img']['size']>0||$get_file['img_1']['size']>0||$get_file['img_0']['size']>0||$get_file['img_2']['size']>0||$get_file['sfz_1']['size']>0||$get_file['sfz_2']['size']>0||$get_file['images']['size']>0){
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
                if($get_file['img_0']['size']>0){
                    $img=$info['img_0']['savename'];
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

        
    }

    //上传文件
    public function lay_upload_file(){
        global $user;

        dump(I('post.'));die;

        if($_FILES['file']['size']>0){
            $upload = new \Think\Upload();// 实例化上传类               
            $upload->maxSize   =     314572800000 ;// 设置附件上传大小
            $upload->exts      =     array('zip', 'rar', 'xls','xlsx', 'doc','docx','ppt','pptx','pdf','jpg','png','jpeg','gif','mp4','mp3','wav','wma');// 设置附件上传类型
            $upload->uploadReplace  = false;// 存在同名文件是否覆盖
            $upload->autoSub   =     false;//是否启用子目录保存
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'layui_oss/'; // 设置附件上传（子）目录
            $upload->saveRule  =     ''; // 设置附件上传（子）目录
             
            // 上传文件 
            $info   =   $upload->upload();


            if(!$info) {
                $data=array();
                $data['code']=0;
                $data['msg']=$upload->getError();
            }else{
                $file=$info['file']['savename'];
                $file_url='/Uploads/layui_oss/'.$file;

                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']["src"]=$file_url;

                //上传到阿里云OSS
                oss_upload( './Uploads/layui_oss/'.$file );
            }

            echo json_encode($data);
        }
        
        
    }



}