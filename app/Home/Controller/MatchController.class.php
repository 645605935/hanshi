<?php

namespace Home\Controller;
use Think\CommonController;

class MatchController extends CommonController{
    public function _initialize(){
        parent::_initialize();

        global $user;
        $user=session('userinfo');
        $this->user=$user;
    }

    public function index(){
        $this->display();
    }


    public function baoming(){
        $this->display();
    }




}