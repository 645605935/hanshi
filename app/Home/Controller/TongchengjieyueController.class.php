<?php

namespace Home\Controller;
use Think\CommonController;

class TongchengjieyueController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;

        $company_id=$_GET['cid'];
        if($company_id){
            //产品分类
            $types_1=M('Product')->where(array('uid'=>$company_id))->distinct(true)->field('type_3')->select();
            $product_type_ids=array();
            foreach ($types_1 as $key => $value) {
                $product_type_ids[]=$value['type_3'];
            }
            $this->product_types=M('Type')->where(array('id'=>array('in', $product_type_ids)))->select();

            //精彩演出
            $types_2=M('Video')->where(array('uid'=>$company_id))->distinct(true)->field('type')->select();
            $video_type_ids=array();
            foreach ($types_2 as $key => $value) {
                $video_type_ids[]=$value['type'];
            }
            $this->video_types=M('Type')->where(array('id'=>array('in', $video_type_ids)))->select();
        }

        //活动分类
        $this->activity_types=M('Type')->where(array('pid'=>1239))->select();
    }

    public function index(){
        global $user;
        $config=M('Config')->find(1);
        $_oss_url_='http://'.$config['oss_url'].'/';
        $_oss_style_50x50_=$config['oss_style_50x50'];
        $_oss_style_150x150_=$config['oss_style_150x150'];



        $where=array();
        $where['gid']=33;
        $where['username']=array('like',"%".'图书馆'."%");

        $count      = M('User')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,4);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('User')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            $list[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }

        $this->page=$Page->show();
        $this->list=$list;


        $map=array();
        $map['gid']=33;
        $map['username']=array('like',"%".'图书馆'."%");
        $block1=M('User')->where($map)->limit(8)->select();
        foreach ($block1 as $key => $value) {
            $block1[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }

        $block2=M('User')->where($map)->limit(3)->select();
        foreach ($block2 as $key => $value) {
            $block2[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }
        $block2_big=M('User')->where($map)->find();
        $block2_big['company_logo']=$_oss_url_ . $block2_big['company_logo']. "?x-oss-process=" . $_oss_style_150x150_;

        $block3=M('User')->where($map)->limit(9)->select();
        foreach ($block3 as $key => $value) {
            $block3[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }
        $block4=M('User')->where($map)->limit(3)->select();
        foreach ($block4 as $key => $value) {
            $block4[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }
        $block4_big=M('User')->where($map)->find();
        $block4_big['company_logo']=$_oss_url_ . $block4_big['company_logo']. "?x-oss-process=" . $_oss_style_150x150_;
        $block5=M('User')->where($map)->limit(24)->select();
        foreach ($block5 as $key => $value) {
            $block5[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }
        $block6=M('User')->where($map)->limit(3)->select();
        foreach ($block6 as $key => $value) {
            $block6[$key]['company_logo']=$_oss_url_ . $value['company_logo']. "?x-oss-process=" . $_oss_style_50x50_;
        }
        $block6_big=M('User')->where($map)->find();
        $block6_big['company_logo']=$_oss_url_ . $block6_big['company_logo']. "?x-oss-process=" . $_oss_style_150x150_;




        $this->block1=$block1;
        $this->block2=$block2;
        $this->block2_big=$block2_big;
        $this->block3=$block3;
        $this->block4=$block4;
        $this->block4_big=$block4_big;
        $this->block5=$block5;
        $this->block6=$block6;
        $this->block6_big=$block6_big;
        $this->display();
    }

    public function qiye(){
        global $user;

        //热门产品推荐
        $this->hot_product=M('Product')->limit(5)->select();

        $this->display();
    }

    public function jianjie(){
        global $user;

        $this->display();
    }

    public function xinwen(){
        global $user;

        $where=array();

        $count      = M('Activity')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,6);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Activity')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;

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

    public function chanpin(){
        global $user;
        
        $where=array();

        $count      = M('Product')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,2);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=M('Product')->page($nowPage.','.$Page->listRows)->where($where)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;

        $this->display();
    }

    

  
}