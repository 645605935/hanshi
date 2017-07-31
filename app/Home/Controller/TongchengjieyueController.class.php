<?php

namespace Home\Controller;
use Think\CommonController;

class TongchengjieyueController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        global $user;

        $this->display();
    }

    public function qiye(){
        global $user;

        $this->display();
    }

    public function jianjie(){
        global $user;

        $this->display();
    }

    public function xinwen(){
        global $user;

        $this->display();
    }

    public function yanchu(){
        global $user;

        $this->display();
    }

    public function chanpin(){
        global $user;
        
        $this->display();
    }

  
}