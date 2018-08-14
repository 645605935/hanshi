<?php

namespace Home\Controller;
use Think\CommonController;

class ApiController extends CommonController{
    public function _initialize(){
        parent::_initialize();
    }

    // 微信小程序上传文件时要用的一些参数
    public function get_wx_upload_oss_params(){
        $data = oss_qianming();
        $data['date']=date('Ymd');
        $data['token']='123456';
        echo json_encode($data);
    }

    // 微信小程序-----保存图片数据
    public function add_image(){
        $image=$_POST['image'];
       
        $data=array();
        $data['uid']='100';
        $data['url']=$image;
        $data['time']=time();

        if(!M('Image')->where(array('url'=>$image))->find()){
            $id=M('Image')->add($data);
        }
        
        $data=array();
        $data['code']=0;
        $data['data']=$image;
        $data['msg']='success';
        echo json_encode($data);
    }

    // 微信小程序-----保存视频数据
    public function add_video(){
        $image=$_POST['image'];
       
        $data=array();
        $data['uid']='100';
        $data['url']=$image;
        $data['time']=time();

        if(!M('Image')->where(array('url'=>$image))->find()){
            $id=M('Image')->add($data);
        }
        
        $data=array();
        $data['code']=0;
        $data['data']=$image;
        $data['msg']='success';
        echo json_encode($data);
    }

    // 微信小程序-----获取图片数据
    public function get_images_list(){
        $list=M('dynamic')->where(array('uid'=>100))->select();
        $list_new=array();
        $base_url='https://oss.jishanstore.com/';
        foreach ($list as $key => $value) {
            switch ($value['type']) {
                case 'video':
                    $_str=$base_url . $value['img'].'?x-oss-process=video/snapshot,t_1000,m_fast';
                    break;
                case 'image':
                    $_str=$base_url . $value['img'].'?x-oss-process=image/quality,q_80';
                    break;
                case 'voice':
                    $_str='https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1534258256974&di=eb1c3c0d1a943b14e2867f663c8c6314&imgtype=0&src=http%3A%2F%2Fy.gtimg.cn%2Fmusic%2Fphoto_new%2FT015R640x360M0000012LyLW2LBYQr.jpg';
                    break;
                
                default:
                    $_str='';
                    break;
            }
            $list_new[$key]['pic']= $_str;
            $list_new[$key]['height']=0;
        }
        if($list){
            $data=array();
            $data['code']=0;
            $data['data']=$list_new;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    // 微信小程序-----获取群聊opengid
    public function get_wx_opengid(){
        vendor('weixinQL.wxBizDataCrypt');
        if($code = $_POST['code']){
            //声明CODE，获取小程序传过来的CODE
            $code = $code;
            //配置appid
            $appid = "wx15649583b2df6592";
            //配置appscret
            $secret = "cc4f1ddfdaf4f66d13f6f88baef5858b";
            //api接口
            $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$code."&grant_type=authorization_code";
            $html = file_get_contents($url);
            $result = json_decode($html, true);


            $appid = $appid;
            $sessionKey = $result['session_key'];
            $encryptedData=$_POST['encryptedData'];
            $iv = $_POST['iv'];


            $pc = new \WXBizDataCrypt($appid, $sessionKey);
            $errCode = $pc->decryptData($encryptedData, $iv, $data );
            if ($errCode == 0) {
                echo($data);
            } else {
                echo($errCode);
            }
        }
    }


    //添加微信群ID
    public function ajax_add_opengid(){
        $uid=$_POST['uid'];
        $opengid=$_POST['opengid'];

        $data=array();
        $data['uid']=$uid;
        $data['opengid']=$opengid;

        $where=array();
        $where['uid']=$uid;
        $where['opengid']=$opengid;


        $row=M('UserOpengid')->where($where)->find();
        if(!$row&&$opengid&&$opengid!='undefined'){
            $id = M('UserOpengid')->add($data);
        }

        echo json_encode($data);
    }

    //获取群ID
    public function ajax_opengid_list(){
        $uid=$_POST['uid'];

        $data=array();
        $data['uid']=$uid;

        $where=array();
        $where['uid']=$uid;


        $list=M('UserOpengid')->where($where)->select();
        if($list){
            $data=array();
            $data['code']=0;
            $data['data']=$list;
            $data['msg']='success';
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    //保存图片信息
    public function ajax_save_images(){
        $uid=$_POST['uid'];
        $content=$_POST['content'];
        $images=explode(',',$_POST['images']);

        $now_time=time();

        $data=array();
        $data['uid']=$uid;
        $data['img']=$_POST['images'];
        $data['content']=$content;
        $data['type']='image';
        $data['time']=$now_time;
        $dynamic_id=M('dynamic')->add($data);
        if($dynamic_id){
            foreach ($images as $key => $value) {
                $data=array();
                $data['uid']=$uid;
                $data['did']=$dynamic_id;
                $data['url']=$value;
                $data['time']=$now_time;
                M('image')->add($data);
            }
        }


        $data=array();
        $data['code']=0;
        $data['msg']='success';

        echo json_encode($data);
    }

    //保存视频信息
    public function ajax_save_videos(){
        $uid=$_POST['uid'];
        $content=$_POST['content'];
        $videos=$_POST['videos'];
        $video_duration=$_POST['video_duration'];
        $video_size=$_POST['video_size'];

        $now_time=time();

        $data=array();
        $data['uid']=$uid;
        $data['img']=$videos;
        $data['content']=$content;
        $data['type']='video';
        $data['time']=$now_time;
        $dynamic_id=M('dynamic')->add($data);
        if($dynamic_id){
            $data=array();
            $data['uid']=$uid;
            $data['did']=$dynamic_id;
            $data['url']=$videos;
            $data['video_duration']=$video_duration;
            $data['video_size']=$video_size;
            $data['time']=$now_time;
            M('video')->add($data);
        }

        $data=array();
        $data['code']=0;
        $data['msg']='success';


        echo json_encode($data);
    }

    //保存录音信息
    public function ajax_save_voices(){
        $uid=$_POST['uid'];
        $content=$_POST['content'];
        $voices=explode(',',$_POST['voices']);

        $now_time=time();

        $data=array();
        $data['uid']=$uid;
        $data['content']=$content;
        $data['type']='voice';
        $data['time']=$now_time;
        $dynamic_id=M('dynamic')->add($data);
        if($dynamic_id){
            $data=array();
            $data['uid']=$uid;
            $data['did']=$dynamic_id;
            $data['url']=$voices[0];
            $data['time']=$now_time;
            M('voice')->add($data);
        }

        $data=array();
        $data['code']=0;
        $data['msg']='success';

        echo json_encode($data);
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
        $base_url="http://zhangtengrui.oss-cn-beijing.aliyuncs.com/";
        $_oss_style_150x150_='image/resize,m_fill,w_300,h_300,limit_0/auto-orient,0/quality,q_100';

        $where=array();
        // if($_GET['city']){
        //     $where['city']=$_GET['city'];
        // }
        // if($_GET['type']){
        //     $where['type']=$_GET['type'];
        // }
        
        $list = M('Auiimage')->where($where)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['url']=$base_url . $value['url']. "?x-oss-process=" . $_oss_style_150x150_;
            $list[$key]['_url']=$base_url . $value['url'];
        }

        echo json_encode($list);
    }

    public function get_svideo_list(){
        $base_url="http://zhangtengrui.oss-cn-beijing.aliyuncs.com/";
        $_oss_style_150x150_='image/resize,m_fill,w_300,h_300,limit_0/auto-orient,0/quality,q_100';

        $where=array();
        // if($_GET['city']){
        //     $where['city']=$_GET['city'];
        // }
        // if($_GET['type']){
        //     $where['type']=$_GET['type'];
        // }
        
        $list = M('Auisvideo')->where($where)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['image']=$base_url . $value['image']. "?x-oss-process=" . $_oss_style_150x150_;
            $list[$key]['video']=$base_url . $value['video'];
        }

        echo json_encode($list);
    }

    public function get_video_list(){
        $base_url="http://zhangtengrui.oss-cn-beijing.aliyuncs.com/";
        $_oss_style_150x150_='image/resize,m_fill,w_300,h_300,limit_0/auto-orient,0/quality,q_100';

        $where=array();
        // if($_GET['city']){
        //     $where['city']=$_GET['city'];
        // }
        // if($_GET['type']){
        //     $where['type']=$_GET['type'];
        // }
        
        $list = M('Auivideo')->where($where)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['img']=$value['img'];
            $list[$key]['ali_video']=$value['ali_video'];
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