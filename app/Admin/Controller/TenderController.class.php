<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class TenderController extends AuthController {
    
    public function _initialize() {
        parent::_initialize();
        global $user;
        $user=session('auth');
        $this->user=$user;
        $this->cur_c='Tender';
    }

    /**
     * @cc index主页面
     */
    public function index(){
        global $user;

        $group=M('auth_group')->where(array('pid'=>0))->select();
        foreach ($group as $key => $value) {
            $group[$key]['_child']=M('auth_group')->where(array('pid'=>$value['id']))->select();
        }
        $this->group=$group;


        $this->cur_v='Tender-index';

        $page="Tender/index";
        $page_buttons=M('PageButtons')->where(array('page'=>$page))->select();
        $this->page_buttons=$page_buttons;
        $this->page=$page;

        
        //分类
        $this->type=M('Type')->where(array('pid'=>1273))->select();
        $this->display();
    }

    /**
     * @cc ajax_get_list获取列表
     */
    public function ajax_get_list(){
        $map=array();
        // if($_GET['types']){
        //     $map['title']=array('like','%'.$_GET['title'].'%');
        // }

        $d = D('Tender');
        $list = $d->where($map)->order('id desc')->relation(true)->select();

        foreach ($list as $key => $value) {
            $list[$key]['time']=date('Y-m-d',$value['time']);
            $list[$key]['end_time']=date('Y-m-d',$value['end_time']);

            $list[$key]['type']=$this->ids_to_types($value['type']);
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


    protected function ids_to_types($types){
        $types_arr=explode('_',$types);

        $str='';
        $arr=array();
        foreach ($types_arr as $key => $value) {
            $temp=M('Type')->find($value);
            $arr[]=$temp['title'];
        }
        $str=implode(',', $arr);
        return $str;
    }

    /**
     * @cc ajax_get_user_relation_logs根据ID获取用户关联的信息
     */
    public function ajax_get_user_relation_logs(){

        $id=$_GET['id'];
        if($id==0){
            $list = array();
        }else{
            $list = D('Log')->where(array('uid'=>$id))->order('time desc')->select();
        }

        echo json_encode($list);
    }

    /**
     * @cc ajax_get_row_info获取单条信息
     */
    public function ajax_get_row_info(){
        $id=I('id');

        if($id){
            $row = M('Tender')->find($id);
            $row['time']=date('Y-m-d', $row['time']);
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

    /**
     * @cc ajax_get_type获取分类
     */
    public function ajax_get_type(){

        $type=M('Type')->where(array('pid'=>1273))->select();

        if($type){
            $data=array();
            $data['code']=0;
            $data['msg']='success';
            $data['data']=$type;
        }else{
            $data=array();
            $data['code']=2;
            $data['msg']='error';
        }

        echo json_encode($data);
    }


    /**
     * @cc ajax_add添加
     */
    public function ajax_add(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['uid']=$user['uid'];
            $data['time']=time();
            $data['end_time']=strtotime($data['end_time']);

            $id = M('Tender')->add($data);
            if($id){
                $row= D('Tender')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$value['time']);
                $row['end_time']=date('Y-m-d H:i',$value['end_time']);

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

    /**
     * @cc ajax_edit编辑
     */
    public function ajax_edit(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();

            $res = M('Tender')->save($data);
            if($res){
                $id=$data['id'];
                $row= D('Tender')->relation(true)->find($id);

                $row['time']=date('Y-m-d H:i',$value['time']);
                $row['end_time']=date('Y-m-d H:i',$value['end_time']);

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

    /**
     * @cc ajax_del删除
     */
    public function ajax_del(){
        $id=I('id'); 

        if($id){
            $res=M('Tender')->where(array('id'=>$id))->delete();

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


    /**
     * @cc 编辑器上传图片【不选则图片上传不了】
     */
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

}