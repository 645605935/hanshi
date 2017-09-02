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
        $list=D('Baoming')->page($nowPage.','.$Page->listRows)->where($where)->relation(true)->order('time desc')->select();
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
        $row=D('Baoming')->relation(true)->find($id);
        
        if(in_array($row['type'], '1286,1288,1289')){
            $row['files']=explode('#', $row['files']);
        }

        $this->row=$row;
        $this->files=$files;
        $this->display();
    }


    public function baoming(){
        global $user;

        $temp=M('User')->field('personal_authentication')->find($user['id']);
        $this->personal_authentication=$temp['personal_authentication'];

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

        $types=M('Type')->where(array('pid'=>1283))->select();
        
        $this->type=$type;
        $this->types=$types;
        $this->match=$match;
        $this->display();
    }

    public function ajax_vote(){
        $t = time();
        $_start_ = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
        $_end_ = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));

        global $user;

        $id=$_GET['id'];
        $mid=$_GET['mid'];
        $type=$_GET['type'];
        $sqz=$_GET['sqz'];

        //查看当前报名是否处于可投票时间段
        $where=array();
        $where['mid']=$mid;
        $where['type']=$type;
        $where['sqz']=$sqz;
        $match_bmz_info=M('match_bmz')->where($where)->find();
        if(1){

        }

        if($user){
            //一个比赛有好多人报名
            //每一比赛的每个人每天最多可以投五个报名
            $where=array();
            $where['time']=array('between',array($_start_, $_end_));
            $where['mid']=$mid;
            $where['uid']=$user['id'];
            $count=M('Votelog')->where($where)->count();

            if($count<5){
                $where=array();
                $where['time']=array('between',array($_start_, $_end_));
                $where['uid']=$user['id'];
                $where['bid']=$id;
                $votelog=M('Votelog')->where($where)->find();
                if($votelog){
                    $data=array();
                    $data['code']=1;
                    $data['msg']='该报名今天已投过！';
                }else{
                    $data=array();
                    $data['type']=$type;
                    $data['uid']=$user['id'];
                    $data['mid']=$mid;
                    $data['bid']=$id;
                    $data['time']=time();
                    M('Votelog')->add($data);

                    $where=array();
                    $where['id']=$id;
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
                $data['code']=1;
                $data['msg']='比赛的报名今天已经投过五场了！';
            }
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='请登录';
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
         
    
    public function ajax_get_sqz(){
        $mid=I('mid');

        $row = M('Match')->find($mid);
        $list=array();
        if($row['type_sqz_online']){
            $list[]=M('Type')->find($row['type_sqz_online']);
        }
        if($row['type_sqz_offline']){
            $list[]=M('Type')->find($row['type_sqz_offline']);
        }

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

    public function ajax_get_sq(){
        $mid=I('mid');
        $sqz=I('sqz');

        $row = M('Match')->find($mid);
        if(1359==$sqz){
            $arr=explode(',', $row['type_sq_online']);
            $list=M('Type')->where(array('id'=>array('in', $arr)))->select();
        }

        if(1360==$sqz){
            $arr=explode(',', $row['type_sq_offline']);
            $list=M('Type')->where(array('id'=>array('in', $arr)))->select();
        }

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

    public function ajax_get_bmz(){
        $mid=I('mid');
        $sqz=I('sqz');

        $row = M('Match')->find($mid);
        if(1359==$sqz){
            $arr=explode(',', $row['online_bmz']);
            $list=M('Type')->where(array('id'=>array('in', $arr)))->select();
        }

        if(1360==$sqz){
            $arr=explode(',', $row['offline_bmz']);
            $list=M('Type')->where(array('id'=>array('in', $arr)))->select();
        }

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

    






















}