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
        $list=M('Match')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            if($value['type']){
                $temp=M('Type')->find($value['type']);
                $list[$key]['_type']=$temp['title'];
            }

            $list[$key]['start_time_y']=date('Y', $value['start_time']);
            $list[$key]['start_time_m_d']=date('m-d', $value['start_time']);
        }

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

        $this->row=$row;
        $this->display();
    }


    public function baoming(){
        global $user;

        $id=$_GET['id'];
        $row=M('Match')->find($id);

        $type=M('Type')->where(array('pid'=>1283))->select();


        $match=M('Match')->where(array('type'=>$row['type']))->select();

        $this->row=$row;
        $this->type=$type;
        $this->match=$match;
        $this->display();
    }

    //添加
    public function ajax_add(){
        global $user;

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