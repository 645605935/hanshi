<?php

$SITE_URL = "http://ek.zhangtengrui.com/";
define('URL_CALLBACK', "" . $SITE_URL . "index.php?s=/Admin/Site/banliao.html&type=");


return array(
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
        '/^login/' => 'Login/lists',
    ),
    //腾讯QQ登录配置
    'THINK_SDK_QQ' => array(
        'APP_KEY' => '101403535', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '277bd1211a708ab8a3e470bda475b9aa', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'qq',
    ),
    //新浪微博配置
    'THINK_SDK_SINA' => array(
        'APP_KEY' => '120967331', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '8aa15f65593eaf9e787baec45a801296', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'sina',
    ),
    //人人网配置
    'THINK_SDK_RENREN' => array(
        'APP_KEY' => '', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '', //应用注册成功后分配的KEY
        'CALLBACK' => URL_CALLBACK . 'renren',
    ),







    'URL_MODEL'  => 2,          //URL模式：0 :普通模式 1 :PATHINFO 2 :REWRITE 3 :兼容模式
);





