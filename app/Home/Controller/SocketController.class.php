<?php
namespace Home\Controller;
use Think\CommonController;
class SocketController extends CommonController {
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    //向客户端发送信息
    public function index() {
        $gateway = new  \Org\Util\Gateway;
        $gateway::$registerAddress = '127.0.0.1:1238';
        $uid = 1;
        $msg = array('type' => 'msg', 'msg' => '你好',);
        $msg = json_encode($msg);
        $gateway::sendToUid($uid, $msg);

        
        $this->display();
    }

    //绑定客户端到对应的用户ID或用户名
    public function bind() { 
        if (!empty($_POST)) {
            $gateway = new \Org\Util\Gateway;
            $gateway::$registerAddress = '127.0.0.1:1238';
            $uid = 1;
            $client_id = I('post.client_id');
            $gateway::bindUid($client_id, $uid);
        }
    }
}
