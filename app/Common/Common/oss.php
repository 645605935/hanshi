<?php
    /**
     * 实例化阿里云oos
     * @return object 实例化得到的对象
     */
    function new_oss(){
        vendor('Alioss.autoload');
        $config=C('ALIOSS_CONFIG');
        $oss=new \OSS\OssClient($config['KEY_ID'],$config['KEY_SECRET'],$config['END_POINT']);
        return $oss;
    }
    /**
     * 上传文件到oss并删除本地文件
     * @param  string $path 文件路径
     * @return bollear      是否上传
     */
    function oss_upload($path){
        // 获取配置项
        $bucket=C('ALIOSS_CONFIG.BUCKET');

        // 先统一去除左侧的.或者/ 再添加./
        $oss_path=ltrim($path,'./');
        $path='./'.$oss_path;

        if (file_exists($path)) {
            // echo 1 ;die;
            // 实例化oss类
            $oss=new_oss();
            // 上传到oss
            $oss->uploadFile($bucket,$oss_path,$path);
            // 如需上传到oss后 自动删除本地的文件 则删除下面的注释
            // unlink($path);
            return true;
        }
        return false;
    }


    //函数库  
    function gmt_iso8601($time) {  
        $dtStr = date("c", $time);  
        $mydatetime = new DateTime($dtStr);  
        $expiration = $mydatetime->format(DateTime::ISO8601);  
        $pos = strpos($expiration, '+');  
        $expiration = substr($expiration, 0, $pos);  
        return $expiration."Z";  
    }  
      
    function oss_qianming(){  
        $KEY_ID=C('ALIOSS_CONFIG.KEY_ID');
        $KEY_SECRET=C('ALIOSS_CONFIG.KEY_SECRET');
        $END_POINT=C('ALIOSS_CONFIG.END_POINT');
        $BUCKET=C('ALIOSS_CONFIG.BUCKET');


        $id= $KEY_ID;  
        $key= $KEY_SECRET;  
        $host = 'http://jishanstore.oss-cn-beijing.aliyuncs.com';  
      
        $now = time();  
        $expire = 30; //设置该policy超时时间是10s. 即这个policy过了这个有效时间，将不能访问  
        $end = $now + $expire;  
        $expiration = gmt_iso8601($end);  
      
        $dir = 'upload/'. date("Ymd",time()) .'/';  
      
        //最大文件大小.用户可以自己设置  
        $condition = array(0=>'content-length-range', 1=>0, 2=>1048576000);  
        $conditions[] = $condition;   
      
        //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录  
        $start = array(0=>'starts-with', 1=>'$key', 2=>$dir);  
        $conditions[] = $start;   
      
      
        $arr = array('expiration'=>$expiration,'conditions'=>$conditions);  
        //echo json_encode($arr);  
        //return;  
        $policy = json_encode($arr);  
        $base64_policy = base64_encode($policy);  
        $string_to_sign = $base64_policy;  
        $signature = base64_encode(hash_hmac('sha1', $string_to_sign, $key, true));  
      
        $response = array();  
        $response['accessid'] = $id;  
        $response['host'] = $host;  
        $response['policy'] = $base64_policy;  
        $response['signature'] = $signature;  
        $response['expire'] = $end;  
        //这个参数是设置用户上传指定的前缀  
        $response['dir'] = $dir;  
        return $response;  
    }  