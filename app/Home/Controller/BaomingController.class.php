<?php

namespace Home\Controller;
use Think\CommonController;

class BaomingController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        global $user;
        $where=array();
        if(I('type')){
            $where['type']=I('type');
        }

        $count      = M('Baoming')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,6);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Baoming')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            if($value['type']){
                $temp=M('Type')->find($value['type']);
                $list[$key]['_type']=$temp['title'];
            }

            $list[$key]['start_time_y']=date('Y', $value['start_time']);
            $list[$key]['start_time_m_d']=date('m-d', $value['start_time']);
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->display();
    }

    public function rule(){
        global $user;

        $id=I('id');
        $row=M('Baoming')->find($id);

        $this->row=$row;
        $this->display();
    }


    public function baoming(){
        global $user;

        $id=I('id');
        $row=M('Baoming')->find($id);
        
        $this->row=$row;
        $this->display();
    }




}