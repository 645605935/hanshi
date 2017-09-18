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

        $this->ad_center=M('Ad')->where(array('type'=>1399))->find();
        $this->ad_vote=M('Ad')->where(array('type'=>1400))->limit(10)->select();


        $type=$_GET['type'];
        $map=array();
        if($_GET['keyword']){
            $where['title']  = array('like', "%".$_GET['keyword']."%");
            $where['author']  = array('like', "%".$_GET['keyword']."%");
            $where['id']  = $_GET['keyword'];
            $where['_logic'] = 'or';
            $map['_complex'] = $where;
        }
        if($_GET['type']){
            $map['type']=$type;
        }
        

        $count      = D('Baoming')->where($map)->count();

        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Baoming')->page($nowPage.','.$Page->listRows)->where($map)->order('time desc')->select();
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
        $row=D('Baoming')->find($id);
        $row['files']=explode('#', $row['files']);

        $this->row=$row;
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


        $time_info=M('match_bmz')->where($where)->find();


        // //初赛报名时间
        // if(time()>$time_info['start_time_1'] && time()<$time_info['end_time_1']){
        //     $data=array();
        //     $data['code']=2;
        //     $data['msg']='当前是：初赛报名时间，不可投票';
        //     echo json_encode($data);return false;
        // }
        // if(time()>$time_info['start_time_2'] && time()<$time_info['end_time_2']){
            
        // }
        // if(time()>$time_info['start_time_3'] && time()<$time_info['end_time_3']){
        //     $data=array();
        //     $data['code']=2;
        //     $data['msg']='当前是：复赛报名时间，不可投票';
        //     echo json_encode($data);return false;
        // }
        // if(time()>$time_info['start_time_4'] && time()<$time_info['end_time_4']){
            
        // }
        // if(time()>$time_info['start_time_5'] && time()<$time_info['end_time_5']){
        //     $data=array();
        //     $data['code']=2;
        //     $data['msg']='当前是：决赛投票时间，不可投票';
        //     echo json_encode($data);return false;
        // }
        // if(time()>$time_info['start_time_6'] && time()<$time_info['end_time_6']){
            
        // }




        //初赛报名时间
        if(
            (time()>$time_info['start_time_2'] && time()<$time_info['end_time_2']) || 
            (time()>$time_info['start_time_4'] && time()<$time_info['end_time_4']) ||
            (time()>$time_info['start_time_6'] && time()<$time_info['end_time_6'])
            ){
            
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='非投票时间，不可投票';
            echo json_encode($data);return false;
        }
        
       




        if( 
            ( time()>$time_info['start_time_2'] && time()<$time_info['end_time_2'] )||
            ( time()>$time_info['start_time_4'] && time()<$time_info['end_time_4'] )||
            ( time()>$time_info['start_time_6'] && time()<$time_info['end_time_6'] )
            ){
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
                            $data['msg']='投票成功';
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
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='当前时间不可投票';
        }

        echo json_encode($data);
    }

    /**
     * 抽奖
     * @param int $total
     */
    public function getReward($total=100){
         $ad_vote=M('Ad')->where(array('type'=>1400))->limit(10)->select();

         $win1 = floor((intval($ad_vote[0]['bfb']) * $total) / 100);
         $win2 = floor((intval($ad_vote[1]['bfb']) * $total) / 100);
         $win3 = floor((intval($ad_vote[2]['bfb']) * $total) / 100);
         $win4 = floor((intval($ad_vote[3]['bfb']) * $total) / 100);
         $win5 = floor((intval($ad_vote[4]['bfb']) * $total) / 100);
         $win6 = floor((intval($ad_vote[5]['bfb']) * $total) / 100);
         $win7 = floor((intval($ad_vote[6]['bfb']) * $total) / 100);
         $win8 = floor((intval($ad_vote[7]['bfb']) * $total) / 100);
         $win9 = floor((intval($ad_vote[8]['bfb']) * $total) / 100);
         $win10 = floor((intval($ad_vote[9]['bfb']) * $total) / 100);

         $return = array();
         for ($a1 = 0;$a1 < $win1;$a1++) {
             $return[] = $ad_vote[$a1]['img'];
         }
         for ($a2 = 0;$a2 < $win2;$a2++) {
             $return[] = $ad_vote[$a2]['img'];
         }
         for ($a3 = 0;$a3 < $win3;$a3++) {
             $return[] = $ad_vote[$a3]['img'];
         }
         for ($a4 = 0;$a4 < $win4;$a4++) {
             $return[] = $ad_vote[$a4]['img'];
         }
         for ($a5 = 0;$a5 < $win5;$a5++) {
             $return[] = $ad_vote[$a5]['img'];
         }

         for ($a6 = 0;$a6 < $win6;$a6++) {
             $return[] = $ad_vote[$a6]['img'];
         }
         for ($a7 = 0;$a7 < $win7;$a7++) {
             $return[] = $ad_vote[$a7]['img'];
         }
         for ($a8 = 0;$a3 < $win8;$a3++) {
             $return[] = $ad_vote[$a3]['img'];
         }
         for ($a9 = 0;$a9 < $win9;$a9++) {
             $return[] = $ad_vote[$a9]['img'];
         }
         for ($a10 = 0;$a10 < $win10;$a10++) {
             $return[] = $ad_vote[$a10]['img'];
         }
        
         
         shuffle($return);
         return  $return[array_rand($return) ];
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