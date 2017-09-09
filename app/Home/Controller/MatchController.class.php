<?php

namespace Home\Controller;
use Think\CommonController;

class MatchController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;


    }

    public function index(){
        global $user;
        $where=array();
        if($type=$_GET['type']){
            $where['type']=$type;
        }
        if($title=$_GET['title']){
            $where['title']=array('like', '%'.$_GET['title'].'%');
        }

        $count      = M('Match')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,6);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Match')->page($nowPage.','.$Page->listRows)->where($where)->order('time desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            if($value['type']){
                $temp=M('Type')->find($value['type']);
                $list[$key]['_type']=$temp['title'];
            }

            $list[$key]['start_time_y']=date('Y', $value['start_time']);
            $list[$key]['start_time_m_d']=date('m-d', $value['start_time']);
        }


        $this->ad_center=M('Ad')->where(array('type'=>1398))->find();

        //recommmend
        $recommmend=M('Match')->where(array('recommmend'=>1))->find();
        $left_company_info=M('Config')->find(1);

        $this->page=$Page->show();
        $this->list=$list;
        $this->recommmend=$recommmend;
        $this->left_company_info=$left_company_info;
        $this->display();
    }

    public function rule(){
        global $user;

        $id=$_GET['id'];
        $row=M('Match')->find($id);

        M('Match')->where(array('id'=>$row['id']))->setInc('eye');

        $this->row=$row;
        $this->display();
    }


    public function baoming(){
        global $user;

        $temp=M('User')->field('personal_authentication')->find($user['id']);
        $this->personal_authentication=$temp['personal_authentication'];

        $id=$_GET['id'];
        $row=M('Match')->find($id);

        $sqz=array();
        if($row['type_sqz_online']){
            $sqz[]=M('Type')->find($row['type_sqz_online']);
        }
        if($row['type_sqz_offline']){
            $sqz[]=M('Type')->find($row['type_sqz_offline']);
        }


        $type=M('Type')->where(array('pid'=>1283))->select();


        $match=M('Match')->where(array('type'=>$row['type']))->select();

        $this->row=$row;
        $this->sqz=$sqz;
        $this->type=$type;
        $this->match=$match;
        $this->display();
    }
    
    public function ajax_check_to_baoming(){
        global $user;

        //如果比赛还没开始,不能报名
        $id=$_GET['id'];

        $match_info=M('match')->find($id);
        if($match_info){
            $start_time=$match_info['start_time'];
            $end_time=$match_info['end_time'];
            if( time()<$start_time ){
                $data=array();
                $data['code']=1;
                $data['msg']='比赛还没开始不能报名';
            }elseif( time()>$end_time ){
                $data=array();
                $data['code']=1;
                $data['msg']='比赛已结束';
            }else{
                $data=array();
                $data['code']=0;
                $data['msg']='success';
            }
        }

        echo json_encode($data);
    }

    //添加
    public function ajax_add(){
        global $user;

        //如果比赛还没开始,不能报名
        $type=$_GET['type'];
        $id=$_GET['id'];

        $match_info=M('match')->find($id);
        if($match_info){
            $start_time=$match_info['start_time'];
            $end_time=$match_info['end_time'];
            if( time()<$start_time ){
                $data=array();
                $data['code']=1;
                $data['msg']='比赛还没开始不能报名';
                return false;
            }elseif( time()>$end_time ){
                $data=array();
                $data['code']=1;
                $data['msg']='比赛已结束';
                return false;
            }
        }

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('Baoming')->add($data);
            if($id){
                $row= D('Baoming')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$row['time']);

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




}