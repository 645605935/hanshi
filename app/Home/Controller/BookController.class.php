<?php

namespace Home\Controller;
use Think\CommonController;

class BookController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        global $user;

        $list_left=D('Book')->where($where)->relation(true)->limit(3)->select();
        $list_right=D('Book')->where($where)->relation(true)->limit(2)->select();

        $where=array();
        $count      = M('Book')->where($where)->count();
        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Book')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->order('id desc')->select();
        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
        }

        //作家
        $recommend_bookers=M('User')->where(array('is_booker'=>1))->limit(3)->select();

        //主播
        $recommend_voicers=M('User')->where(array('is_voicer'=>1))->limit(3)->select();

        $this->page=$Page->show();
        $this->list=$list;
        $this->list_left=$list_left;
        $this->list_right=$list_right;
        $this->recommend_bookers=$recommend_bookers;
        $this->recommend_voicers=$recommend_voicers;
        $this->display();
    }

    public function detail(){
        global $user;

        $id=I('id');
        $row=M('Book')->find($id);

        $this->row=$row;
        $this->display();
    }

    // 排行
    public function ranking(){
        global $user;

        $this->display();
    }
    
    // 目录
    public function directory(){
        global $user;

        $bid=$_GET['bid'];
        if($_GET['bjid']){
            $bjid=$_GET['bjid'];
        }else{
            $bjid=1;
        }

        $book=M('Book')->find($bid);
        $book_juan=M('BookJuan')->where(array('bid'=>$bid))->select();
        $book_zhang=M('BookZhang')->where(array('bid'=>$bid, 'bjid'=>$bjid))->select();

        $this->base_url=$_SERVER['HTTP_HOST'];

        $this->book=$book;
        $this->book_juan=$book_juan;
        $this->book_zhang=$book_zhang;
        $this->display();
    }

    // 阅读页
    public function look(){
        global $user;

        $row=M('BookZhang')->find($_GET['id']);
        
        $this->row=$row;
        $this->display();
    }


    public function Book(){
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

                $res = M('Book')->where($where)->setInc('vote');
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