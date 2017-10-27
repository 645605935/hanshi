<?php

namespace Home\Controller;
use Think\CommonController;

class IdeasController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        global $user;

        $map=array();
        $count      = D('Ideas')->where($map)->count();
        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Ideas')->page($nowPage.','.$Page->listRows)->where($map)->order('id desc')->relation(true)->select();

        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);

            $str=$value['content']; 
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
            preg_match_all($pattern,$str,$match); 
            $list[$key]['images']=$match[1];

            $list[$key]['pinglun']=D('IdeasItem')->where(array('iid'=>$value['id'],'status'=>0))->count();
        }

        $this->page=$Page->show();
        $this->list=$list;
        $this->display();
    }



    public function detail(){
        global $user;

        $id=I('id');
        $row=D('Ideas')->find($id);

        //在设置结束时间前评论不显示
        if(time()<$row['start_time']){
            $is_show=0;
        }

        if(time()>$row['start_time'] && time()<$row['end_time']){
            $is_show=0;
        }
        
        if(time()>$row['end_time']){
            $is_show=1;
        }

        $list=D('IdeasItem')->where(array('iid'=>$id,'status'=>0))->order('time desc')->relation(true)->select();

        $collect=M('CollectIdeas')->where(array('iid'=>$id,'uid'=>$user['id']))->find();
        if($collect){
            $this->is_collect=1;
        }
        
        $this->list=$list;
        $this->row=$row;
        $this->is_show=$is_show;
        $this->display();
    }



    //点赞
    public function ajax_dianzan(){
        global $user;

        $id=$_GET['id'];

        if($id){
            $res = M('Ideas')->where(array('id'=>$id))->setInc('zan');
            if($res){
                $row=M('Ideas')->find($id);
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
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }

    //收藏
    public function ajax_collect(){
        global $user;

        $id=$_GET['id'];

        if($id){
            $data=array();
            $data['uid']=$user['id'];
            $data['iid']=$id;
            $data['time']=time();
            $id = M('CollectIdeas')->add($data);
            if($id){
                $row=M('Ideas')->find($id);
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

    //取消收藏
    public function ajax_cancel_collect(){
        global $user;

        $id=$_GET['id'];

        if($id){
            $where=array();
            $where['uid']=$user['id'];
            $where['iid']=$id;
            $res = M('CollectIdeas')->where($where)->delete();
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


    

    
    //添加
    public function ajax_add(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['id'];
            $data['time']=time();

            $id = M('IdeasItem')->add($data);
            if($id){
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
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }





















}