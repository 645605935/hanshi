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

        $type=I('type');
        $where=array();
        if($type){
            $where['type']=$type;
            $match=M('Match')->where(array('type'=>$type))->select();
        }else{
            $match=M('Match')->select();
        }

        $count      = M('Baoming')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Baoming')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->type=$type;
        $this->display();
    }

    public function detail(){
        global $user;

        $id=I('id');
        $row=M('Baoming')->find($id);

        if($row['images']){
            $images=explode('#', $row['images']);
        }
        

        $this->row=$row;
        $this->images=$images;
        $this->display();
    }


    public function baoming(){
        global $user;

        $type=I('type');
        $where=array();
        if($type){
            $where['type']=$type;
            $match=M('Match')->where($where)->select();
        }else{
            $temp=M('Type')->where(array('pid'=>1283))->select();
            $arrs=array();
            foreach ($temp as $key => $value) {
                $arrs[]=$value['id'];
            }
            $where['type']=array('in', $arrs);
            $match=M('Match')->where($where)->select();
        }
        
        $this->type=$type;
        $this->match=$match;
        $this->display();
    }

    public function ajax_vote(){
        // echo get_client_ip();die;
        global $user;

        $id=$_GET['id'];
        if($id&&$user){
            $votelog=M('Votelog')->where(array('uid'=>$user['id'],'bid'=>$id))->find();
            if($votelog){
                $data=array();
                $data['code']=1;
                $data['msg']='您已投过！';
            }else{
                $where=array();
                $where['id']=$id;


                $data=array();
                $data['uid']=$user['id'];
                $data['bid']=$id;
                $data['time']=time();
                M('Votelog')->add($data);

                $res = M('Baoming')->where($where)->setInc('vote');
                if($res){
                    $num=$this->getReward();

                    $data=array();
                    $data['code']=0;
                    $data['msg']='success';
                    $data['num']=$num;
                }else{
                    $data=array();
                    $data['code']=1;
                    $data['msg']='error';
                }
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    /**
     * 抽奖
     * @param int $total
     */
    public function getReward($total=1000){
         $win1 = floor((12 * $total) / 100);
         $win2 = floor((30 * $total) / 100);
         $win3 = floor((52 * $total) / 100);
         $other = $total - $win1 - $win2 - $win3;
         $return = array();
         for ($i = 0;$i < $win1;$i++) {
             $return[] = 1;
         }
         for ($j = 0;$j < $win2;$j++) {
             $return[] = 2;
         }
         for ($m = 0;$m < $win3;$m++) {
             $return[] = 3;
         }
         for ($n = 0;$n < $other;$n++) {
             $return[] = '谢谢惠顾';
         }
         shuffle($return);
         return $return[array_rand($return) ];
    }
         
























}