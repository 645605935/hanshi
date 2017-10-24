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
        

        $count      = D('Ideas')->where($map)->count();

        $Page       = new \Common\Extend\Page($count,8);
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list=D('Ideas')->page($nowPage.','.$Page->listRows)->where($map)->order('id desc')->select();
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
        $row=D('Ideas')->find($id);

        $list=D('IdeasItem')->where(array('iid'=>$id))->order('time desc')->relation(true)->select();
        
        $this->list=$list;
        $this->row=$row;
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