<?php

namespace Home\Controller;
use Think\CommonController;

class UserController extends CommonController{

    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;

        if(!$user){
            $_SESSION['returnUrl']=$_SERVER['HTTP_REFERER'];
            $this->redirect('Home/Index/login',array('gr'=>1));
        }
    }

    //帐号设置
    public function personal_setting(){
        global $user;

        $row=M('User')->find($user['id']);
        $this->xingzuo=M('Type')->where(array('pid'=>1350))->select();
        $this->province=M('Province')->select();
        $this->city=M('City')->where(array('fatherid'=>$row['province']))->select();

        $this->row=$row;
        $this->display();
    }

    public function personal_baoming(){
        global $user;

        $where=array();
        $where['uid']=$user['id'];
        if($_GET['type']&&$_GET['type']=='待审核'){
            $where['status']=0;
        }
        if($_GET['type']&&$_GET['type']=='已退回'){
            $where['status']=-1;
        }

        $count      = M('Baoming')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,6);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Baoming')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->order('time desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->display();
    }

    public function personal_baoming_edit(){
        global $user;

        //比赛时间信息
        $temp=M('Baoming')->find($_GET['id']);
        $where=array();
        $where['mid']=$temp['mid'];
        $where['sqz']=$temp['sqz'];
        $time_info=M('MatchBmz')->where($where)->find();
        $time_info['_tip']="当前时间不可编辑";

        //初赛报名时间
        if(time()>$time_info['start_time_1'] && time()<$time_info['end_time_1']){
            $time_info['_tip']="当前是：初赛报名时间，可编辑";
            $this->editable=1;
        }
        if(time()>$time_info['start_time_2'] && time()<$time_info['end_time_2']){
            $time_info['_tip']="当前是：初赛投票时间，不可编辑";
            $this->editable=0;
        }
        if(time()>$time_info['start_time_3'] && time()<$time_info['end_time_3']){
            $time_info['_tip']="当前是：复赛报名时间，可编辑";
            $this->editable=1;
        }
        if(time()>$time_info['start_time_4'] && time()<$time_info['end_time_4']){
            $time_info['_tip']="当前是：初赛投票时间，不可编辑";
            $this->editable=0;
        }
        if(time()>$time_info['start_time_5'] && time()<$time_info['end_time_5']){
            $time_info['_tip']="当前是：决赛报名时间，可编辑";
            $this->editable=1;
        }
        if(time()>$time_info['start_time_6'] && time()<$time_info['end_time_6']){
            $time_info['_tip']="当前是：初赛报名时间，不可编辑";
            $this->editable=0;
        }
        

        $row=D('Baoming')->relation(true)->find($_GET['id']);
        $row['_files']=explode('#', $row['files']);
        $this->row=$row;

        $this->time_info=$time_info;
        $this->display();
    }

    public function ajax_edit_baoming(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('Baoming')->save($data);
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

    

    //个人主页
    public function index(){
        global $user;

        $this->display();
    }

    //个人认证
    public function personal_authentication(){
        global $user;

        $userinfo=M('user')->find($user['id']);
        if($userinfo['email_authentication']==1){
            $this->row=M('User')->find($user['id']);
            $this->display();
        }else{
            header("Content-type:text/html;charset=utf-8");
            $this->redirect('Home/User/bd_email', array(), 3, '请先进行邮箱验证...');
        }
        
    }

    //绑定邮箱
    public function bd_email(){
        global $user;

        if($_GET['code']){
            $row=M('SendEmail')->where(array('uid'=>$_GET['code']))->find();
            $data=array();
            $data['email']=$row['email'];
            $data['id']=$row['uid'];
            $data['email_authentication']=1;
            $data['time']=time();

            M('User')->save($data);
        }

        $this->row=M('User')->find($user['id']);
        $this->display();
    }

    //发送邮件
    public function ajax_send_email(){
        global $user;

        $data=array();
        $data=$_POST;

        if($data){
            $data['time']=time();

            $row=M('SendEmail')->where(array('uid'=>$_POST['uid']))->find();
            if($row){
                $res=M('SendEmail')->where(array('uid'=>$_POST['uid']))->save($data);
            }else{
                $res=M('SendEmail')->add($data);
            }
            
            if($res){
                $userinfo=M('User')->find($user['id']);
                $e_email=$_POST['email'];
                $e_username=$userinfo['username'];
                think_send_mail($e_email, $e_username, '瞰世商城','瞰世商城 http://'.$_SERVER['HTTP_HOST'].'/Home/User/bd_email.html&code='.$user['id'].' ！');

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


        $all_zhang_count=0;
        foreach ($juan_list as $key => $value) {
            $zhang_count=M('BookZhang')->where(array('bjid'=>$value['id'], 'status'=>1))->count();
            $juan_list[$key]['num']=$zhang_count;
            $juan_list[$key]['_child']=M('BookZhang')->where(array('bjid'=>$value['id'], 'status'=>1))->select();
            $all_zhang_count+=$zhang_count;
        }



        $this->juan_count=count($juan_list);
        $this->all_zhang_count=$all_zhang_count;
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
            $data['no']=microtime();
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
            //获得默认卷名
            $juan_list=M('BookJuan')->where(array('uid'=>$user['id'], 'bid'=>$_POST['bid']))->order('id desc')->select();
            if($juan_list){
                $juan_num=$juan_list[0]['juan_num'];
            }else{
                $juan_num=0;
            }
            
            $juan="第".$this->number2chinese($juan_num+1,false)."卷";

            $data['juan_num']=$juan_num+1;
            $data['juan']=$juan;
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
        // if(!$res){
        if($res){
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
        $row['num']=M('BookZhang')->where(array('bjid'=>$row['id'], 'status'=>1))->count();
        
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

    //添加章但不发布
    public function ajax_add_zhang_not_publish(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $book_juan_info=M('BookJuan')->find($_POST['id']);
            $data['time']=time();
            $data['uid']=$user['id'];
            $data['bid']=$book_juan_info['bid'];

            $res = M('BookZhang')->add($data);
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



    
    

    // 用户登出
    public function logout() {
        session('userinfo',null);
        $this->redirect('Home/Index/index');
    }   


    /**
    * 数字转换为中文
    * @param  string|integer|float  $num  目标数字
    * @param  integer $mode 模式[true:金额（默认）,false:普通数字表示]
    * @param  boolean $sim 使用小写（默认）
    * @return string
    */
    public function number2chinese($num,$mode = true,$sim = true){
        if(!is_numeric($num)) return '含有非数字非小数点字符！';
        $char    = $sim ? array('零','一','二','三','四','五','六','七','八','九')
        : array('零','壹','贰','叁','肆','伍','陆','柒','捌','玖');
        $unit    = $sim ? array('','十','百','千','','万','亿','兆')
        : array('','拾','佰','仟','','萬','億','兆');
        $retval  = $mode ? '元':'';
        //小数部分
        if(strpos($num, '.')){
            list($num,$dec) = explode('.', $num);
            $dec = strval(round($dec,2));
            if($mode){
                $retval .= "{$char[$dec['0']]}角{$char[$dec['1']]}分";
            }else{
                for($i = 0,$c = strlen($dec);$i < $c;$i++) {
                    $retval .= $char[$dec[$i]];
                }
            }
        }
        //整数部分
        $str = $mode ? strrev(intval($num)) : strrev($num);
        for($i = 0,$c = strlen($str);$i < $c;$i++) {
            $out[$i] = $char[$str[$i]];
            if($mode){
                $out[$i] .= $str[$i] != '0'? $unit[$i%4] : '';
                    if($i>1 and $str[$i]+$str[$i-1] == 0){
                    $out[$i] = '';
                }
                    if($i%4 == 0){
                    $out[$i] .= $unit[4+floor($i/4)];
                }
            }
        }
        $retval = join('',array_reverse($out)) . $retval;
        return $retval;
    }
    
    
}