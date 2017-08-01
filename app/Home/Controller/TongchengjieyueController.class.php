<?php

namespace Home\Controller;
use Think\CommonController;

class TongchengjieyueController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        global $user;
        $where=array();

        $count      = M('User')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,4);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('User')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $config=M('Config')->find(1);
        $_oss_url_='http://'.$config['oss_url'].'/';
        $_oss_style_48x48_=$config['oss_style_48x48'];
        


        $block1=M('User')->limit(8)->select();
        foreach ($block1 as $key => $value) {
            $block1[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_48x48_;
        }

        $block2=M('User')->limit(3)->select();
        $block2_big=M('User')->find(1);
        $block3=M('User')->limit(9)->select();
        $block4=M('User')->limit(3)->select();
        $block4_big=M('User')->find(1);
        $block5=M('User')->limit(24)->select();
        $block6=M('User')->limit(3)->select();
        $block6_big=M('User')->find(1);


        $this->page=$Page->show();
        $this->list=$list;
        $this->block1=$block1;
        $this->block2=$block2;
        $this->block2_big=$block2_big;
        $this->block3=$block3;
        $this->block4=$block4;
        $this->block4_big=$block4_big;
        $this->block5=$block5;
        $this->block6=$block6;
        $this->block6_big=$block6_big;
        $this->list=$list;
        $this->display();
    }

    public function qiye(){
        global $user;

        $this->display();
    }

    public function jianjie(){
        global $user;

        $this->display();
    }

    public function xinwen(){
        global $user;

        $this->display();
    }

    public function yanchu(){
        global $user;

        $this->display();
    }

    public function chanpin(){
        global $user;
        
        $this->display();
    }

  
}