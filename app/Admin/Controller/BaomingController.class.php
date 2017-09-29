<?php
namespace Admin\Controller;
use Common\Controller\AuthController;

class BaomingController extends AuthController {
    
    public function _initialize() {
        parent::_initialize();
        global $user;
        $user=session('auth');
        $this->user=$user;
        $this->cur_c='Baoming';

        if($_POST){
            $this->_POST=$_POST;
        }
    }

    public function index(){
        global $user;

        $this->cur_v='Baoming-index';
        $this->type=M('Type')->where(array('pid'=>1283))->select();
        $this->sqz=M('Type')->where(array('pid'=>1358))->select();
        $this->display();
    }

    //列表
    public function ajax_get_list(){
        if($_GET['print']==1){

            $map=array();
            $where=array();
            if($_GET['keyword']){
                $where['author'] = array('like', '%'.$_GET['keyword'].'%');
                $where['title']  = array('like', '%'.$_GET['keyword'].'%');
                $where['_logic'] = 'or';
                $map['_complex'] = $where;
            }

            if($_GET['sqz']){
                $map['sqz']=$_GET['sqz'];
            }

            if($_GET['chusai_status']){
                $map['chusai_status']=$_GET['chusai_status'];
            }

            if($_GET['fusai_status']){
                $map['fusai_status']=$_GET['fusai_status'];
            }

            if($_GET['juesai_status']){
                $map['juesai_status']=$_GET['juesai_status'];
            }

            if($_GET['sq']){
                $map['sq']=$_GET['sq'];
            }
            if($_GET['bmz']){
                $map['bmz']=$_GET['bmz'];
            }

            if($_GET['start_time']&&$_GET['end_time']){
                $start_time=strtotime($_GET['start_time']);
                $end_time=strtotime($_GET['end_time']);
                $map['time']=array('between', array($start_time, $end_time));
            }

            $d = D('Baoming');
            $list = $d->where($map)->order('id desc')->relation(true)->select();

            $sql= $d->getlastsql();

            foreach ($list as $key => $value) {
                $list[$key]['time']=date('Y-m-d H:i',$value['time']);
            }

            
            if($list){
                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']=$list;
                $data['sql']=$sql;
            }else{
                $data=array();
                $data['code']=1;
                $data['msg']='未搜索到数据';
                $data['data']=array();
                $data['sql']=$sql;
            }
            echo json_encode($data);
        }else{
            /**
             *导出预定产品用户信息
             * 大白驴   675835721
             *2016-12-12
             **/


            // $p_name = $_POST['order_p_name'];
             $m = M('User');
            // $datas['order_p_name'] = $p_name;
             $list = $m->field('id,username,time')->select();
             foreach ($list as $k => $v){
                 $list[$k]['time']=$v['time']=date('Y-m-d',$v['time']);
             }
             //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
             import("Org.Util.PHPExcel");
             import("Org.Util.PHPExcel.Writer.Excel5");
             import("Org.Util.PHPExcel.IOFactory.php");
             $filename="test_excel";
             $headArr=array("uid","用户名","注册时间");
             $this->getExcel($filename,$headArr,$list);
        }
    }




    private function getExcel($fileName,$headArr,$data){
        //对数据进行检验
        if(empty($data) || !is_array($data)){
            die("data must be a array");
        }
        //检查文件名
        if(empty($fileName)){
            exit;
        }
        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;

    }

    //获取单条信息
    public function ajax_get_row_info(){
        $id=I('id');

        if($id){
            $row = D('Baoming')->find($id);

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

    //添加票数
    public function ajax_add_num(){
        global $user;

        if($num=$_POST['num']){
            $ids=$_POST['ids'];
            $ids_arr=explode('_',$ids);
            $list=M('Baoming')->where(array('id'=>array('in',$ids_arr)))->select();

            $res=0;
            foreach ($list as $key => $value) {
                M('Baoming')->where(array('id'=>$value['id']))->setInc('vote',$num);
                $res++;
            }

            if($res==count($list)){
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
            $data['uid']=$user['uid'];
            $data['time']=time();
            $data['start_time']=strtotime($data['start_time']);
            $data['end_time']=strtotime($data['end_time']);

            $id = M('Baoming')->add($data);
            if($id){
                $row= D('Baoming')->relation(true)->find($id);

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

            $res = M('Baoming')->save($data);
            if($res){
                $id=$data['id'];
                $row= D('Baoming')->relation(true)->find($id);

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

    //审核
    public function ajax_check(){
        global $user;

        $data=array();
        $data=$_POST;
        if($data){
            $data['time']=time();
            
            $res = M('Baoming')->save($data);
            if($res){
                $id=$data['id'];
                $row= D('Baoming')->relation(true)->find($id);

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

    public function ajax_get_sqz(){
        $list=M('Type')->where(array('pid'=>1358))->select();

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
        $sqz=I('sqz');

        if(1359==$sqz){
            $list=M('Type')->where(array('pid'=>1375))->select();
        }

        if(1360==$sqz){
            $list=M('Type')->where(array('pid'=>1378))->select();
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
        $sqz=I('sqz');

        if(1359==$sqz){
            $list=M('Type')->where(array('pid'=>1374))->select();
        }

        if(1360==$sqz){
            $list=M('Type')->where(array('pid'=>1379))->select();
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

    //删除
    public function ajax_del(){
        $id=I('id'); 

        if($id){
            $res=M('Baoming')->where(array('id'=>$id))->delete();

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
                $data['data']["src"]='http://'.$_SERVER['HTTP_HOST'].'/Uploads/layui/'.$img;
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
                $video_url='http://'.$_SERVER['HTTP_HOST'].'/Uploads/layui/'.$video;

                $data=array();
                $data['code']=0;
                $data['msg']='success';
                $data['data']["src"]=$video_url;
            }

            //上传到阿里云OSS
            oss_upload( './Uploads/layui/'.$video );

            echo json_encode($data);
        }
    }


    

}