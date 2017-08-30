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

    //帐号设置
    public function setting(){
        global $user;

        $row=M('User')->find($user['id']);
        $this->xingzuo=M('Type')->where(array('pid'=>1350))->select();
        $this->province=M('Province')->select();
        $this->city=M('City')->where(array('fatherid'=>$row['province']))->select();

        $this->row=$row;
        $this->display();
    }

    //个人主页
    public function index(){
        global $user;

        $this->display();
    }

    //个人认证
    public function personal_authentication(){
        global $user;

        if(!$user){
            $this->row=M('User')->find($user['id']);
            $this->display();
        }else{
            $this->redirect('Home/User/login', array('gr' => 1));
        }
        
    }

    //任务库
    public function voice_task(){
        global $user;

        $this->display();
    }

    //我的样音
    public function voice_demo_list(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];

        $count      = D('VoiceDemo')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,5);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('VoiceDemo')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;

        $this->display();
    }

    //上传样音
    public function voice_create_demo(){
        global $user;

        $this->type=M('Type')->where(array('pid'=>1299))->select();
        $this->type_1=M('Type')->where(array('pid'=>1332))->select();
        $this->type_2=M('Type')->where(array('pid'=>1333))->select();
        $this->display();
    }

    //修改样音
    public function voice_demo_edit(){
        global $user;

        $this->row=M('VoiceDemo')->find($_GET['id']);
        $this->type_1=M('Type')->where(array('pid'=>1332))->select();
        $this->type_2=M('Type')->where(array('pid'=>1333))->select();
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

    //保存设置
    public function ajax_save_userinfo(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('User')->save($data);
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

    //添加样音
    public function ajax_add_voice_demo(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('VoiceDemo')->add($data);
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

    //编辑样音
    public function ajax_edit_voice_demo(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('VoiceDemo')->save($data);
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

    //添加身份证
    public function ajax_personal_authentication(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();
            $data['personal_authentication']=1;

            $id = M('User')->save($data);
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

    public function book_list(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];

        $count      = D('Book')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,5);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Book')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->display();
    }

    //设置图书基本信息
    public function book_set(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['id']=$_GET['id'];

        $row=M('Book')->where($where)->find();
        $tags_arr=explode('_', $row['tags']);

        $_tags_arr=array();
        $_tags_title='';
        foreach ($tags_arr as $key => $value) {
            $temp=M('Type')->find($value);
            $_tags_arr[]=$temp['title'];
        }
        $_tags_title=implode(' ', $_tags_arr);
        $row['tags_title']=$_tags_title;

        
        $tags_type=M('Type')->where(array('pid'=>1300))->select();

        foreach ($tags_type as $key => $value) {

            $temp=M('Type')->where(array('pid'=>$value['id']))->select();
            foreach ($temp as $k => $v) {
                if (in_array($v['id'], $tags_arr)) {
                    $temp[$k]['selected']=' act ';
                } else {
                    $temp[$k]['selected']='';
                }
            }

            $tags_type[$key]['_child']=$temp;
        }


        $type=M('Type')->where(array('pid'=>1309))->select();
        $type_1=M('Type')->where(array('pid'=>1299))->select();
        $type_2=M('Type')->where(array('pid'=>$row['type_1']))->select();

        $this->type_count=count($tags_type);
        $this->tags_type=$tags_type;
        $this->row=$row;
        $this->type=$type;
        $this->type_1=$type_1;
        $this->type_2=$type_2;
        $this->display();
    }

    //已发布章节
    public function book_create(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['bid']=$_GET['id'];

        $juan_list=M('BookJuan')->where($where)->select();
        foreach ($juan_list as $key => $value) {
            $juan_list[$key]['num']=M('BookZhang')->where(array('bjid'=>$value['id']))->count();
            $juan_list[$key]['_child']=M('BookZhang')->where(array('bjid'=>$value['id'], 'status'=>1))->select();
        }

        $this->juan_list=$juan_list;
        $this->display();
    }

    //上传声音到专辑
    public function voice_create_to_specail(){
        global $user;

        $special=M('SpecialVoice')->where(array('uid'=>$user['id']))->select();
        $type=M('Type')->where(array('pid'=>1299))->select();

        $this->special=$special;
        $this->type=$type;
        $this->display();
    }

    //上传声音到书城
    public function voice_create_to_book(){
        global $user;

        $book=M('Book')->select();

        $this->book=$book;
        $this->display();
    }

    //添加专辑
    public function ajax_add_special_voice(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('SpecialVoice')->add($data);
            if($id){
                $special=M('SpecialVoice')->where(array('uid'=>$user['id']))->select();

                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']=$special;
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

    public function ajax_get_book_juan(){
        $book_id=$_GET['id'];

        $list = M('BookJuan')->where(array('bid'=>$book_id))->select();

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

    public function ajax_get_book_zhang(){
        $book_juan_id=$_GET['id'];

        $list = M('BookZhang')->where(array('bjid'=>$book_juan_id))->select();

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
    
    //主播首页
    public function voice_index(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['status'] = -1;

        $list=M('BookZhang')->where($where)->select();

        $this->list=$list;
        $this->display();
    }
    
    //我的声音
    public function voice_mine(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['status'] = -1;

        $list=M('BookZhang')->where($where)->select();

        $this->list=$list;
        $this->display();
    }

    //回收站
    public function book_recycle(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        $where['status'] = -1;

        $list=M('BookZhang')->where($where)->select();

        $this->list=$list;
        $this->display();
    }

    //草稿箱
    public function book_draft(){
        global $user;

        $juan_list=M('BookJuan')->where(array('uid'=>$user['id']))->select();

        $where=array();
        $where['uid']=$user['id'];
        $where['status'] = 0;

        $list=M('BookZhang')->where($where)->select();

        $this->juan_list=$juan_list;
        $this->list=$list;
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
            $data['uid']=$user['id'];
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

    //添加声音
    public function ajax_add_voice(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('Voice')->add($data);
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

    

    //编辑书
    public function ajax_save_book(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $id = M('Book')->save($data);
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
            $data['uid']=$user['id'];
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

    //异步渲染章节信息
    public function ajax_render_zhang_info(){
        global $user;

        $zid=$_GET['zid'];
        $row = M('BookZhang')->find($zid);
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

        echo json_encode($data);
    }

    //异步渲染卷信息
    public function ajax_render_juan_info(){
        global $user;

        $jid=$_GET['jid'];
        $row = M('BookJuan')->find($jid);
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

        echo json_encode($data);
    }

    //编辑卷
    public function ajax_edit_juan(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('BookJuan')->save($data);
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

    //编辑章
    public function ajax_edit_zhang(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('BookZhang')->save($data);
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

    //恢复为草稿
    public function ajax_restore_zhang(){
        $zid=I('zid'); 

        if($zid){
            $data=array();
            $data['id']=$zid;
            $data['status']=0;
            $data['time']=time();
            $res=M('BookZhang')->save($data);

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

    //删除章
    public function ajax_cg_del_zhang(){
        $zid=I('zid'); 

        if($zid){
            $data=array();
            $data['id']=$zid;
            $data['status']=-1;
            $data['time']=time();
            $res=M('BookZhang')->save($data);

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

    //删除卷
    public function ajax_fj_del_juan(){
        $jid=I('jid'); 

        if($jid){
            $res=M('BookJuan')->delete($jid);

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

    

    //彻底删除
    public function ajax_cd_del_zhang(){
        $zid=I('zid'); 

        if($zid){
            $res=M('BookZhang')->delete($zid);

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


    public function ajax_font_count(){
        if($content=$_POST['content']){
            $num=ccStrLen($content);

            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=intval($num);
            
            echo json_encode($data);
        }
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
        if(!$_GET['gr']&&!$_GET['zf']&&!$_GET['qy']){
            $this->redirect('Home/User/login', array('gr' => 1));
        }else{
            $this->display();
        }
    }

    public function ajax_login(){
        if($_POST['gid']==44){
            $where=array();
            $where['gid']=$_POST['gid'];
            $where['username']=$_POST['username'];
            $where['password']=md5($_POST['password']);

            $row=M('User')->where($where)->find();
            if($row && $row['status']==0){
                $data=array();
                $data['code']=1;
                $data['msg']='请审核通过后再登录';
            }elseif($row && $row['status']==1){
                session('userinfo',$row);

                $data=array();
                $data['code']=0;
                $data['msg']='登录成功';
            }else{
                $data=array();
                $data['code']=2;
                $data['msg']='用户名或密码不存在';
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='您不属于个人用户！';
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

    // 用户登出
    public function logout() {
        session('userinfo',null);
        $this->redirect('Home/Index/index');
    }   
}