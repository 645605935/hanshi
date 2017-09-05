function init(){
    //获取焦点
    $(".login-input input").focus(function(){
        // 边框变色
        $(this).closest(".login-input").addClass("input-now");
        //叉号出现
        $(this).next(".clear-input").show();
        //右侧正确icon隐藏
        $(this).parent().next(".js-tip-right").hide();
    });
    // 点击叉号
    $(".clear-input").click(function(){
        // 清空内容
        $(this).siblings("input").val("");
        $(".js-tip-right").hide();
        // 获取焦点
        $(this).siblings("input").focus();
        //右侧正确icon隐藏
        $(this).parent().next(".js-tip-right").hide();
    })
    //用户名文本框失去焦点的时候
    $(".nametxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        var reg = /^[A-Za-z].*$/;
        //用户名为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("用户名不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //长度错误
        else if($(this).val().length < 4 || $(this).val().length > 20 ){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("用户名须在4-20字符之间");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //字母开头
        else if(!reg.test($(this).val())){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("必须以字母开头");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //空格错误
        else if($(this).val().indexOf(" ")!= -1){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("用户名中不得包含空格");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    });
    //手机号码文本框失去焦点
    $(".phonetxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        var reg = /^[1][3578][0-9]{9}$/;
        //手机号为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("手机号码不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //手机号格式错误
        else if(!reg.test($(this).val())){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("手机号格式错误");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //邮箱验证 文本框失去焦点
    $(".emailtxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        var reg = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
        //邮箱为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("邮箱不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //邮箱格式错误
        else if(!reg.test($(this).val())){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("邮箱格式错误");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //密码框失去焦点事件
    $(".passtxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        //密码为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("密码不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //长度错误
        else if($(this).val().length < 6 || $(this).val().length > 16 ){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("密码须在6-16字符之间");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //空格错误
        else if($(this).val().indexOf(" ")!= -1){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("密码中不得包含空格");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //重复新密码
    $(".passtxt2").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        //密码为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("密码不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //两次不一致
        else if($(this).val() != $(".passtxt").val()){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("两次密码不一致");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //验证码
    $(".codetxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        //为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("验证码不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //短信/邮箱验证码
    $(".msgtxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        //为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("验证码不能为空");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
    //登录界面输入用户名/邮箱/手机
    $(".idtxt").blur(function(){
        // 边框变色
        $(this).closest(".login-input").removeClass("input-now");
        // 清除内容的话 叉号隐藏
        if ($(this).val() == ""){
            $(this).next(".clear-input").hide();
        }
        //验证
        //为空
        if($(this).val() == ""){
            $(".js-tip-wrong").show();
            $(".js-tip-wrong").html("请填写手机/邮箱/用户名");
            // 边框变色
            $(this).closest(".login-input").addClass("input-wrong");
        }
        //正确
        else{
            $(".js-tip-wrong").hide();
            $(this).parent().siblings(".js-tip-right").show();
            // 边框变色
            $(this).closest(".login-input").removeClass("input-wrong");
        }
    })
}
