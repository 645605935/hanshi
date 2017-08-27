<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class MatchController extends AuthController {
    
    public function _initialize() {
        parent::_initialize();
        global $user;
        $user=session('auth');
        $this->user=$user;
        $this->cur_c='Match';

        if($_POST){
            $this->_POST=$_POST;
        }
    }

    public function index(){
        global $user;

        $group=M('auth_group')->where(array('pid'=>0))->select();
        foreach ($group as $key => $value) {
            $group[$key]['_child']=M('auth_group')->where(array('pid'=>$value['id']))->select();
        }
        $this->group=$group;


        $this->cur_v='Match-index';

        $page="Match/index";
        $page_buttons=M('PageButtons')->where(array('page'=>$page))->select();
        $this->page_buttons=$page_buttons;
        $this->page=$page;

        $this->type_bmz=M('Type')->where(array('pid'=>1358))->select();
        $this->type_sqz=M('Type')->where(array('pid'=>1362))->select();
        $this->type=M('Type')->where(array('pid'=>1283))->select();
        $this->display();
    }

    public function ajax_get_type_sq(){
        $type_sqz=I('id');

        $type_sq = M('Type')->where(array('pid'=>$type_sqz))->select();

        if($type_sq){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$type_sq;
        }else{
            $data=array();
            $data['code']=1;
            $data['msg']='未搜索到数据';
            $data['data']=array();
        }
        echo json_encode($data);
    }

    //列表
    public function ajax_get_list(){
        $map=array();
        if($_GET['title']){
            $map['title']=array('like','%'.$_GET['title'].'%');
        }

        $d = D('Match');
        $list = $d->where($map)->order('id desc')->relation(true)->select();

        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d H:i',$value['time']);
            $list[$key]['start_time']=date('Y-m-d H:i',$value['start_time']);
            $list[$key]['end_time']=date('Y-m-d H:i',$value['end_time']);
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

    //获取单条信息
    public function ajax_get_row_info(){
        $id=I('id');

        if($id){
            $row = D('Match')->find($id);
            $match_bmz_info=M('match_bmz')->where(array('mid'=>$row['id']))->select();
            foreach ($match_bmz_info as $key => $value) {
                if($value['start_time_1']){
                    $match_bmz_info[$key]['start_time_1']=date('Y-m-d', $value['start_time_1']);
                }else{
                    $match_bmz_info[$key]['start_time_1']="";
                }
                if($value['end_time_1']){
                    $match_bmz_info[$key]['end_time_1']=date('Y-m-d', $value['end_time_1']);
                }else{
                    $match_bmz_info[$key]['end_time_1']="";
                }

                if($value['start_time_2']){
                    $match_bmz_info[$key]['start_time_2']=date('Y-m-d', $value['start_time_2']);
                }else{
                    $match_bmz_info[$key]['start_time_2']="";
                }
                if($value['end_time_2']){
                    $match_bmz_info[$key]['end_time_2']=date('Y-m-d', $value['end_time_2']);
                }else{
                    $match_bmz_info[$key]['end_time_2']="";
                }

                if($value['start_time_3']){
                    $match_bmz_info[$key]['start_time_3']=date('Y-m-d', $value['start_time_3']);
                }else{
                    $match_bmz_info[$key]['start_time_3']="";
                }
                if($value['end_time_3']){
                    $match_bmz_info[$key]['end_time_3']=date('Y-m-d', $value['end_time_3']);
                }else{
                    $match_bmz_info[$key]['end_time_3']="";
                }

                if($value['start_time_4']){
                    $match_bmz_info[$key]['start_time_4']=date('Y-m-d', $value['start_time_4']);
                }else{
                    $match_bmz_info[$key]['start_time_4']="";
                }
                if($value['end_time_4']){
                    $match_bmz_info[$key]['end_time_4']=date('Y-m-d', $value['end_time_4']);
                }else{
                    $match_bmz_info[$key]['end_time_4']="";
                }

                if($value['start_time_5']){
                    $match_bmz_info[$key]['start_time_5']=date('Y-m-d', $value['start_time_5']);
                }else{
                    $match_bmz_info[$key]['start_time_5']="";
                }
                if($value['end_time_5']){
                    $match_bmz_info[$key]['end_time_5']=date('Y-m-d', $value['end_time_5']);
                }else{
                    $match_bmz_info[$key]['end_time_5']="";
                }

                if($value['start_time_6']){
                    $match_bmz_info[$key]['start_time_6']=date('Y-m-d', $value['start_time_6']);
                }else{
                    $match_bmz_info[$key]['start_time_6']="";
                }
                if($value['end_time_6']){
                    $match_bmz_info[$key]['end_time_6']=date('Y-m-d', $value['end_time_6']);
                }else{
                    $match_bmz_info[$key]['end_time_6']="";
                }
            }
            $row['_bmz']=$match_bmz_info;

            $row['time']=date('Y-m-d H:i',$row['time']);
            $row['start_time']=date('Y-m-d H:i',$row['start_time']);
            $row['end_time']=date('Y-m-d H:i',$row['end_time']);


// dump($row);die;
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
            $data['uid']=$user['uid'];
            $data['time']=time();
            $data['start_time']=strtotime($data['start_time']);
            $data['end_time']=strtotime($data['end_time']);

            $id = M('Match')->add($data);
            if($id){
                //添加比赛报名组
                foreach ($_POST['match_bmz'] as $key => $value) {
                    if($value!=''){
                        $arr=explode('#', $value);
                        $data=array();
                        $data['mid']=$id;
                        $data['type']=$key;
                        $data['time']=time();

                        $data['start_time_1']=strtotime($arr[0]);
                        $data['end_time_1']=strtotime($arr[1]);
                        $data['start_time_2']=strtotime($arr[2]);
                        $data['end_time_2']=strtotime($arr[3]);
                        $data['start_time_3']=strtotime($arr[4]);
                        $data['end_time_3']=strtotime($arr[5]);
                        $data['start_time_4']=strtotime($arr[6]);
                        $data['end_time_4']=strtotime($arr[7]);
                        $data['start_time_5']=strtotime($arr[8]);
                        $data['end_time_5']=strtotime($arr[9]);
                        $data['start_time_6']=strtotime($arr[10]);
                        $data['end_time_6']=strtotime($arr[11]);

                        M('match_bmz')->add($data);
                    }
                }

                


                $row= D('Match')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$row['time']);
                $row['start_time']=date('Y-m-d H:i',$row['start_time']);
                $row['end_time']=date('Y-m-d H:i',$row['end_time']);

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

    //编辑
    public function ajax_edit(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();
            $data['start_time']=strtotime($data['start_time']);
            $data['end_time']=strtotime($data['end_time']);

            $res = M('Match')->save($data);
            if($res){

                $id=$data['id'];
                $row= D('Match')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$row['time']);
                $row['start_time']=date('Y-m-d H:i',$row['start_time']);
                $row['end_time']=date('Y-m-d H:i',$row['end_time']);

                if($row){

                    //重置比赛报名组
                    M('match_bmz')->where(array('mid'=>$_POST['id']))->delete();
                    foreach ($_POST['match_bmz'] as $key => $value) {
                        if($value!=''){
                            $arr=explode('#', $value);
                            $data=array();
                            $data['mid']=$_POST['id'];
                            $data['type']=$key;
                            $data['time']=time();

                            $data['start_time_1']=strtotime($arr[0]);
                            $data['end_time_1']=strtotime($arr[1]);
                            $data['start_time_2']=strtotime($arr[2]);
                            $data['end_time_2']=strtotime($arr[3]);
                            $data['start_time_3']=strtotime($arr[4]);
                            $data['end_time_3']=strtotime($arr[5]);
                            $data['start_time_4']=strtotime($arr[6]);
                            $data['end_time_4']=strtotime($arr[7]);
                            $data['start_time_5']=strtotime($arr[8]);
                            $data['end_time_5']=strtotime($arr[9]);
                            $data['start_time_6']=strtotime($arr[10]);
                            $data['end_time_6']=strtotime($arr[11]);

                            M('match_bmz')->add($data);
                        }
                    }


                    
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

    //删除
    public function ajax_del(){
        $id=I('id'); 

        if($id){
            $res=M('Match')->where(array('id'=>$id))->delete();

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


    // 上传图片
    public function lay_upload_file(){
        if($_FILES['file']['size']>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     31457280 ;// 设置附件上传大小
            $upload->exts      =     array('zip', 'rar', 'xls','xlsx', 'doc','docx','ppt','pptx','pdf','jpg','png','jpeg','gif');// 设置附件上传类型
            $upload->uploadReplace  = false;// 存在同名文件是否覆盖
            $upload->autoSub   =     false;//是否启用子目录保存
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'layui/'; // 设置附件上传（子）目录
            $upload->saveRule  =     ''; // 设置附件上传（子）目录
             
            // 上传文件 
            $info   =   $upload->upload();

            if(!$info) {
                $data=array();
                $data['code']=0;
                $data['msg']=$upload->getError();
            }else{
                $img=$info['file']['savename'];
                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']["src"]='/Uploads/layui/'.$img;
            }

            echo json_encode($data);
        }
    }


    // 上传视频
    public function lay_upload_file_video(){
        if($_FILES['file_video']['size']>0){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     31457280 ;// 设置附件上传大小
            $upload->exts      =     array('mp4');// 设置附件上传类型
            $upload->uploadReplace  = false;// 存在同名文件是否覆盖
            $upload->autoSub   =     false;//是否启用子目录保存
            $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
            $upload->savePath  =     'layui/'; // 设置附件上传（子）目录
            $upload->saveRule  =     ''; // 设置附件上传（子）目录
             
            // 上传文件 
            $info   =   $upload->upload();

            if(!$info) {
                $data=array();
                $data['code']=0;
                $data['msg']=$upload->getError();
            }else{
                $video=$info['file_video']['savename'];
                $video_url='/Uploads/layui/'.$video;

                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']["src"]=$video_url;
            }

            //上传到阿里云OSS
            oss_upload( '/Uploads/layui/'.$video );

            echo json_encode($data);
        }
    }


    

}