<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="renderer" content="webkit">
<title>主页</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="/Public/Home/css/reset.css">
<link rel="stylesheet" href="/Public/Home/css/style.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
</head>
<body>
<!-- 引用 -->
<?php
 $top_nav_saishihuodong=M('Type')->where(array('pid'=>1283))->select(); $_page_=$_SERVER['PATH_INFO']; ?>


<div class="top-add"><a href="#4"><img src="/Public/Home/images/img3.jpg" alt=""></a></div>
<div class="head w1000">
    <div class="header fl">
        <div class="logo fl"><a href="#"><img src="/Public/Home/images/logo.jpg" alt=""></a></div>
        <div class="search fl">
            <input type="text" class="fl">
            <a href="javascript:;" class="fl"></a>
        </div>
        <div class="head-icon fl">
            <a href="#4" class="gwc"></a>
            <a href="#4" class="yx"></a>
            <a href="#4" class="sc"></a>
        </div>
        <div class="erweima fr"><img src="/Public/Home/images/erweima.jpg" alt=""></div>
    </div>
</div>
<div class="clear"></div>
<div class="nav clearfix">
    <ul>
        <li>
            <a href="fenlei-remen.html" class="li-a">发现</a>
            <ul>
                <li><a href="fenlei-remen.html">热门推荐</a></li>
                <li><a href="zuojiatuijian.html">人气主播</a></li>
                <li><a href="zuojiatuijian.html">人气作家</a></li>
                <li><a href="#2">赚钱途径</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo U('Home/Book/index');?>" class="li-a">书城</a>
            <ul>
                <li><a href="tongchengjieyue.html"><span class="color1">在线借阅</span></a></li>
                <li><a href="shucheng-zhuye1.html">图书购买</a></li>
                <li><a href="shucheng-zhuye1.html">电子书</a></li>
                <li><a href="shucheng-zhuye1.html">有声读物</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo U('Home/Tongchengjieyue/index');?>" class="li-a <?php if(stripos($_page_,'Tongchengjieyue/index') !== false): ?>cur<?php endif; ?>">分类清单</a>
            <ul <?php if(stripos($_page_,'Tongchengjieyue/index') !== false): ?>style="display:block;"<?php endif; ?>>
                <li>
                    <a href="<?php echo U('Home/Tongchengjieyue/index');?>">
                        <?php if(!$_GET['type']): ?><span class="color1">同城借阅</span>
                        <?php else: ?>
                            同城借阅<?php endif; ?>
                    </a>
                </li>
                <li><a href="fenlei-zhiyuanzhe.html">志愿者活动</a></li>
                <li><a href="fenlei-remen.html">热门活动</a></li>
                <li><a href="fenlei-chuantong.html">传统文化</a></li>
                <li><a href="fenlei-yanchu.html">精彩演出</a></li>
                <li><a href="<?php echo U('Home/Tongchengjieyue/chanpin');?>">热卖产品</a></li>
                <li><a href="#2">创客空间</a></li>
                <li><a href="fenlei-kecheng.html">精品课程</a></li>
            </ul>
        </li>
        <li>
            <a href="<?php echo U('Home/Index/shop');?>" class="li-a">瞰世商城</a>
            <ul>
                <li><a href="#2"><span class="color1">在线配音</span></a></li>
                <li><a href="#2">录音设备</a></li>
                <li><a href="#2">出版图书</a></li>
                <li><a href="#2">培训课程</a></li>
            </ul>
        </li>
        <li>         
            <a href="<?php echo U('Home/Match/index');?>" class="li-a <?php if(stripos($_page_,'Match/index') !== false): ?>cur<?php endif; ?>">赛事活动</a>
            <ul <?php if(stripos($_page_,'Match/index') !== false): ?>style="display:block;"<?php endif; ?>>
                <li>
                    <a href="<?php echo U('Home/Match/index');?>">
                        <?php if(!$_GET['type']): ?><span class="color1">全部</span>
                        <?php else: ?>
                            全部<?php endif; ?>
                    </a>
                </li>
                <?php if(is_array($top_nav_saishihuodong)): foreach($top_nav_saishihuodong as $key=>$v): ?><li>
                        <a href="<?php echo U('Home/Match/index',array('type'=>$v['id']));?>">
                            <?php if($v['id'] == $_GET['type']): ?><span class="color1"><?php echo ($v["title"]); ?></span>
                            <?php else: ?>
                                <?php echo ($v["title"]); endif; ?>
                        </a>
                    </li><?php endforeach; endif; ?>
            </ul>
        </li>
        <li>
            <a href="<?php echo U('Home/Baoming/index');?>" class="li-a <?php if(stripos($_page_,'Baoming/index') !== false): ?>cur<?php endif; ?>">参赛报名</a>
            <ul <?php if(stripos($_page_,'Baoming/index') !== false): ?>style="display:block;"<?php endif; ?>>
                <li>
                    <a href="<?php echo U('Home/Baoming/index');?>">
                        <?php if(!$_GET['type']): ?><span class="color1">全部</span>
                        <?php else: ?>
                            全部<?php endif; ?>
                    </a>
                </li>
                <?php if(is_array($top_nav_saishihuodong)): foreach($top_nav_saishihuodong as $key=>$v): ?><li>
                        <a href="<?php echo U('Home/Baoming/index',array('type'=>$v['id']));?>">
                            <?php if($v['id'] == $_GET['type']): ?><span class="color1"><?php echo ($v["title"]); ?></span>
                            <?php else: ?>
                                <?php echo ($v["title"]); endif; ?>
                        </a>
                    </li><?php endforeach; endif; ?>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="li-a">合作通道</a>
            <ul>
                <li><a href="#2"><span class="color1">志愿者报名</span></a></li>
                <li><a href="#2">平台建议</a></li>
                <li><a href="#2">瞰世联线</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="li-a">认证</a>
            <ul>
                <li><a href="#2"><span class="color1">个人身份认证</span></a></li>
                <li><a href="#2">作家认证</a></li>
                <li><a href="#2">主播认证</a></li>
            </ul>
        </li>
    </ul>
    <div class="ul-con mt10">
        <div class="lon w1000">
            <div class="fr">
                <?php if($user): ?><a href="<?php echo U('Home/User/book_list');?>"><?php echo ($user["username"]); ?></a>
                <?php else: ?>
                    <a href="<?php echo U('Home/User/gr_reg');?>">注册</a><span>|</span>
                    <a href="<?php echo U('Home/User/login');?>">登录</a><?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="container container1">
    <div class="con">
        <div class="content mt20 clearfix bg3 index-con">
            <div class="bg2 clearfix pt20 pl10 pr10">
                <div class="left-nav">
                    <!-- 引用 -->
                    <?php  $left_video_types=M('Type')->where(array('pid'=>1293))->select(); ?>

<ul>
    <li><a><i class="stx"></i>主题市场</a></li>
    <li><a href="<?php echo U('Home/Tongchengjieyue/index');?>">同城借阅</a></li>
    <li><a href="huodong.html">活动视频</a></li>
	

	<?php if(is_array($left_video_types)): foreach($left_video_types as $key=>$v): ?><li <?php if($_GET['type'] == $v['id']): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Home/Index/yanchu',array('type'=>$v['id']));?>"><?php echo ($v['title']); ?></a></li><?php endforeach; endif; ?>



    <li><a href="shucheng-zhuye1.html">有声文学</a></li>
    <li><a href="shucheng-zhuye1.html">文学阅读</a></li>
    <li><a href="#4">创客空间</a></li>
    <li><a href="#4">瞰世学院</a></li>
    <li><a href="<?php echo U('Home/Index/shop');?>">瞰世商城</a></li>
</ul>
                </div>
                <div class="mid-swiper">
                    <div class="pl20">
                        <div class="slide-box">
                            <div class="bd">
                                <ul>
                                    <li><a href="#2"><img src="/Public/Home/images/imgg.jpg" alt=""></a></li>
                                    <li><a href="#2"><img src="/Public/Home/images/imgg.jpg" alt=""></a></li>
                                    <li><a href="#2"><img src="/Public/Home/images/imgg.jpg" alt=""></a></li>
                                </ul>
                            </div>
                            <a class="prev" href="javascript:void(0)"></a>
                            <a class="next" href="javascript:void(0)"></a>
                            <div class="hd">
                                <ul></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-ann fr">
                    <div class="ann-top">
                        <h2>志愿者报名</h2>
                        <ul>
                            <li><a href="#2">报名需知</a></li>
                        </ul>
                        <p class="mt10"><a href="fenlei-zhiyuanzhe.html" class="bm-rk">报名入口</a></p>
                    </div>
                    <div class="ann-bot">
                        <h2>点子商城</h2>
                        <ul>
                            <li><a href="#2">个人</a></li>
                            <li><a href="#2">与政府、企业</a></li>
                            <li><a href="#2">在线互动</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="con-tongji">目前已有<span>9999</span>名志愿者参与公共文化志愿活动</div>
            <div class="tuijian mt20">
                <ul>
                    <li class="rq-color1">
                        <a href="#2">
                            <span class="tuij-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                            <h3>可惜是水瓶</h3>
                            <p>不潮不花钱</p>
                            <p class="tuij-rq"><span></span>人气99999</p>
                        </a>
                    </li>
                    <li class="rq-color2">
                        <a href="#2">
                            <span class="tuij-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                            <h3>气质女神</h3>
                            <p>傻白甜慎入</p>
                            <p class="tuij-rq"><span></span>人气99999</p>
                        </a>
                    </li>
                    <li class="rq-color3">
                        <a href="#2">
                            <span class="tuij-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                            <h3>水果大咖</h3>
                            <p>维生素加油站</p>
                            <p class="tuij-rq"><span></span>人气99999</p>
                        </a>
                    </li>
                    <li class="rq-color4">
                        <a href="#2">
                            <span class="tuij-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                            <h3>家有萌娃</h3>
                            <p>宝宝快快长大</p>
                            <p class="tuij-rq"><span></span>人气99999</p>
                        </a>
                    </li>
                    <li class="rq-color5">
                        <a href="#2">
                            <span class="tuij-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                            <h3>蕾丝控</h3>
                            <p>少女蕾丝心</p>
                            <p class="tuij-rq"><span></span>人气99999</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
            <div class="goods-show">
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>本周热榜</em><span class="xian"></span><p>口号</p><a href="shucheng.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bb pt20 pb20 bg2 clearfix">
                            <div class="right-bl fl bg5 p20">
                                <div class="slider">
                                    <div class="bd">
                                        <ul>
                                            <li>
                                                <a href="shucheng.html"><img src="/Public/Home/images/img1.jpg" /></a>
                                            </li>
                                            <li>
                                                <a href="shucheng.html"><img src="/Public/Home/images/img1.jpg" /></a>
                                            </li>
                                            <li>
                                                <a href="shucheng.html"><img src="/Public/Home/images/img1.jpg" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="txt">
                                        <ul>
                                            <li>
                                                <div class="right-blcon">
                                                    <div class="bok-n">《手动阀手动阀》<span class="fr">9.6分</span></div>
                                                    <p><span>作者：</span>xxx<span class="ml20">主播：</span>xxx</p>
                                                    <p><span>简介：</span>斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法斯蒂芬撒旦法</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="right-blcon">
                                                    <div class="bok-n">《手动阀手动阀》<span class="fr">9.6分</span></div>
                                                    <p><span>作者：</span>xxx<span class="ml20">主播：</span>xxx</p>
                                                    <p><span>简介：</span>死啦的咖啡机阿里山的价格拉深刻的解放啦开始的减肥</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="right-blcon">
                                                    <div class="bok-n">《手动阀手动阀》<span class="fr">9.6分</span></div>
                                                    <p><span>作者：</span>xxx<span class="ml20">主播：</span>xxx</p>
                                                    <p><span>简介：</span>阿萨德法师迪欧按公司的感觉萨洛克</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pnBtn prev">
                                        <span class="blackBg"></span>
                                        <span class="arrow"></span>
                                    </div>
                                    <div class="pnBtn next">
                                        <span class="blackBg"></span>
                                        <span class="arrow"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="right-br fl pl10">
                                <ul class="rightt-ul">
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-blb fl">
                                <ul class="rightt-ul">
                                    
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="shucheng.html">
                                            <span class="shu-imgg"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                            <div class="shu-r">
                                                <h3>《撒的》</h3>
                                                <div class="shu-fl mt10 mb10"><span class="fs16">分类</span><span class="color1">水电费</span><span class="fr">9.6分</span></div>
                                                <p><span class="fs16">作者</span>行行行</p>
                                                <p><span class="fs16">主播</span>行行行</p>
                                                <p class="mt5 jj"><span class="fs16">简介</span>行行行行行行行行行行行行行行行</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="zyz" name="zyz"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>志愿者活动</em><span class="xian"></span><p>口号</p><a href="fenlei-zhiyuanzhe.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom">
                            <div class="huodong">
                                <ul>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="rm" name="rm"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>热门活动推荐</em><span class="xian"></span><p>口号</p><a href="fenlei-remen.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom">
                            <div class="huodong">
                                <ul>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/Public/Home/images/img1.jpg" alt="" class="img1">
                                        <div class="plr10">
                                            <h3>活动主题</h3>
                                            <p><span class="fs16">活动内容</span>：活动内容活动内容活动内容活动内容活动内容活动内容活动内容</p>
                                            <p class="mt10"><a href="baoming.html" class="hd-bm">报名</a><span class="fr">主办单位</span></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="yc" name="yc"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>精彩演出</em><span class="xian"></span><p>口号</p><a href="fenlei-yanchu.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom">
                            <div class="yanchu">
                                <ul>
                                    <li>
                                         <img class="videoo fl" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <div class="yanchu-r fl">
                                            <p>剧目名称：<span>《惺惺惜惺惺》</span>表演类型：<span>惺惺惜惺惺</span>导演/指导：<span>惺惺惜惺惺</span>表演团队：<span>惺惺惜惺惺</span></p>
                                            <p><em class="fs16">介绍</em>：介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍</p>
                                            <div class="y-time"><em class="fs16">热播时间</em>：1999年9月9日<div class="fr sc-btn"><a href="javascript:;" class="sc"></a><a href="#2" class="buy-btn"><i></i>在线购票</a></div></div>
                                        </div>
                                    </li>
                                     <li>
                                         <img class="videoo fl" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <div class="yanchu-r fl">
                                            <p>剧目名称：<span>《惺惺惜惺惺》</span>表演类型：<span>惺惺惜惺惺</span>导演/指导：<span>惺惺惜惺惺</span>表演团队：<span>惺惺惜惺惺</span></p>
                                            <p><em class="fs16">介绍</em>：介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍</p>
                                            <div class="y-time"><em class="fs16">热播时间</em>：1999年9月9日<div class="fr sc-btn"><a href="javascript:;" class="sc"></a><a href="#2" class="buy-btn"><i></i>在线购票</a></div></div>
                                        </div>
                                    </li>
                                     <li>
                                         <img class="videoo fl" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <div class="yanchu-r fl">
                                            <p>剧目名称：<span>《惺惺惜惺惺》</span>表演类型：<span>惺惺惜惺惺</span>导演/指导：<span>惺惺惜惺惺</span>表演团队：<span>惺惺惜惺惺</span></p>
                                            <p><em class="fs16">介绍</em>：介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍介绍</p>
                                            <div class="y-time"><em class="fs16">热播时间</em>：1999年9月9日<div class="fr sc-btn"><a href="javascript:;" class="sc"></a><a href="#2" class="buy-btn"><i></i>在线购票</a></div></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="ct" name="ct"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>传统文化演出</em><span class="xian"></span><p>口号</p><a href="fenlei-chuantong.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom">
                            <div class="right-r fl">
                                <h3><i class="scdw"></i>上传单位</h3>
                                <img class="videoo" src="/Public/Home/images/img1.jpg" alt="">
                                <!-- <video controls="controls" class="videoo">
                                   <source src="shipin.mp4" type="video/mp4">
                                </video> -->
                                <p>剧目名称<span class="leibie">类别</span><span class="fr num">收看人数：100</span></p>
                            </div>
                            <div class="right-l fl">
                                <ul>
                                    <li>
                                        <h3><i class="scdw"></i>上传单位</h3>
                                        <img class="videoo" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <p>剧目名称<span class="leibie">类别</span><span class="fr num">收看人数：100</span></p>
                                    </li>
                                    <li>
                                        <h3><i class="scdw"></i>上传单位</h3>
                                        <img class="videoo" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <p>剧目名称<span class="leibie">类别</span><span class="fr num">收看人数：100</span></p>
                                    </li>
                                    <li>
                                        <h3><i class="scdw"></i>上传单位</h3>
                                        <img class="videoo" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <p>剧目名称<span class="leibie">类别</span><span class="fr num">收看人数：100</span></p>
                                    </li>
                                    <li>
                                        <h3><i class="scdw"></i>上传单位</h3>
                                        <img class="videoo" src="/Public/Home/images/img1.jpg" alt="">
                                        <!-- <video controls="controls" class="videoo">
                                           <source src="shipin.mp4" type="video/mp4">
                                        </video> -->
                                        <p>剧目名称<span class="leibie">类别</span><span class="fr num">收看人数：100</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <a id="rem" name="rem"></a>
                <div class="goods-con hot-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>热卖产品</em><span class="xian"></span><p>口号</p><a href="qiye.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom hot-goods">
                            <ul>
                                <li>
                                    <h2>录音设备</h2>
                                    <div class="hot-left">
                                        <p class="hot-name"><a href="#2">产品名称及型号</a></p>
                                        <p class="hot-pri">200元</p>
                                        <p class="hot-num">已售2222件</p>
                                        <p class="hot-by">全场包邮</p>
                                    </div>
                                    <div class="hot-img">
                                        <a href="qiye.html"><img src="/Public/Home/images/img1.jpg" alt=""></a>
                                    </div>
                                </li>
                                <li>
                                    <h2>出版图书</h2>
                                    <div class="hot-left">
                                        <p class="hot-name"><a href="#2">产品名称及型号</a></p>
                                        <p class="hot-pri">200元</p>
                                        <p class="hot-num">已售2222件</p>
                                        <p class="hot-by">全场包邮</p>
                                    </div>
                                    <div class="hot-img">
                                        <a href="qiye.html"><img src="/Public/Home/images/img1.jpg" alt=""></a>
                                    </div>
                                </li>
                                <li>
                                    <h2>培训课程</h2>
                                    <div class="hot-left">
                                        <p class="hot-name"><a href="#2">产品名称及型号</a></p>
                                        <p class="hot-pri">200元</p>
                                        <p class="hot-num">已售2222件</p>
                                        <p class="hot-by">全场包邮</p>
                                    </div>
                                    <div class="hot-img">
                                        <a href="qiye.html"><img src="/Public/Home/images/img1.jpg" alt=""></a>
                                    </div>
                                </li>
                                <li>
                                    <h2>在线配音</h2>
                                    <div class="hot-left">
                                        <p class="hot-name"><a href="#2">产品名称及型号</a></p>
                                        <p class="hot-pri">200元</p>
                                        <p class="hot-num">已售2222件</p>
                                        <p class="hot-by">全场包邮</p>
                                    </div>
                                    <div class="hot-img">
                                        <a href="qiye.html"><img src="/Public/Home/images/img1.jpg" alt=""></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a id="ck" name="ck"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>创客空间</em><span class="xian"></span><p>口号</p><a href="#4" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom ck-space">
                            <ul>
                                <li>
                                    <a href="#2">
                                        <span class="ck-img"><img src="/Public/Home/images/ck1.jpg" alt=""></span>
                                        <p class="ck-name">网站建设</p>
                                        <p>口号</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#2">
                                        <span class="ck-img"><img src="/Public/Home/images/ck2.jpg" alt=""></span>
                                        <p class="ck-name">APP定制</p>
                                        <p>口号</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#2">
                                        <span class="ck-img"><img src="/Public/Home/images/ck3.jpg" alt=""></span>
                                        <p class="ck-name">平台推广</p>
                                        <p>口号</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a id="kc" name="kc"></a>
                <div class="goods-con clearfix">
                    <div class="right-con">
                        <div class="right-top">
                            <h2><em><i class="hx"></i>精品课程</em><span class="xian"></span><p>口号</p><a href="fenlei-kecheng.html" class="more fr">更多></a></h2>
                        </div>
                        <div class="right-bottom jp-kc">
                            <ul>
                                <li>
                                    <a href="fenlei-kecheng.html">
                                        <span class="kc-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="fenlei-kecheng.html">
                                        <span class="kc-img"><img src="/Public/Home/images/img1.jpg" alt=""></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="foot-con">
                        <ul>
                            <li>地址：天津市青年路85号</li>
                            <li>邮箱：ksyf_801@163.com</li>
                            <li>邮编：300101</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="right-fixed">
    <ul>
        <li class="r1"><a href="shucheng-zhuye.html" target="_blank">书城</a></li>
        <li class="r2"><a href="#zyz">志愿者活动</a></li>
        <li class="r3"><a href="#rm">热门活动</a></li>
        <li class="r4"><a href="#ct">传统文化</a></li>
        <li class="r5"><a href="#rem">热卖产品</a></li>
        <li class="r6"><a href="#ck">创客空间</a></li>
        <li class="r7"><a href="#kc">精品课程</a></li>
        <li class="r8"><a href="#yc">精彩演出</a></li>
        <li class="goTop"><a href="#">返回头部</a></li>
    </ul>
</div>
<div class="clear"></div>

<!-- 引用 -->
<div id="bot" class="mt20">
    <div class="bot1">
        <div class="w1000 clear">
            <div class="fl colorMain clear left">
                <span class="icon-yqlj mr5 mt5 fl"></span><b class="fl">友情链接：</b>       
            </div>
            <div class="right">
                <ul>
                    <li><a href="#">足球协会</a></li>
                    <li><a href="#">篮球协会</a></li>
                    <li><a href="#">天津市体育局</a></li>
                    <li><a href="#">国家体育总局</a></li>
                    <li><a href="#">全运组委会</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bot2">
        <div class="w1000 marok">
            <div class="sinak">
                <span class="jt"></span>
                <img src="/Public/Home/images/erweima.jpg" class="ma">
            </div>
            <div class="wxk">
                <span class="jt"></span>
                <img src="/Public/Home/images/erweima.jpg" class="ma">
            </div>
            <a href="javascript:;" class="bgsinaRed"><img src="/Public/Home/images/xing.png" alt=""></a>
            <a href="javascript:;" class="bgwxGreen"><img src="/Public/Home/images/xing.png" alt=""></a>
            <a href="index.html" class="botlogo"><img src="/Public/Home/images/logoo.png"></a>
        </div>
    </div>
    <div class="bot3">
        <div class="w1000">
            Tian Jin Bei Li Jian Sports Consulting Co., Ltd. ©2017 All Rights Reserved 津ICP备00000000号
        </div>
    </div>
</div>


<script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
<script>
    jQuery(".slide-box").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:false});
    jQuery(".slider .bd li").first().before( jQuery(".slider .bd li").last() );
    jQuery(".slider .pnBtn").hover(function(){ jQuery(this).find(".arrow").show() },function(){ jQuery(this).find(".arrow").hide() });
    jQuery(".slider").slide({ mainCell:".bd ul", effect:"leftLoop", autoPlay:false, vis:3, mouseOverStop:false,
        startFun:function(i){
             jQuery(".slider .txt li").eq(i).animate({"bottom":0}).siblings().animate({"bottom":-110});
        }
     });
</script>
<script src="/Public/Home/js/index.js"></script>
</body>
</html>