$(function(){
	var winWidth,winHeight;
	if(window.innerWidth){
		winWidth=window.innerWidth;
		}
	else if((document.body)&&(document.body.clientWidth)){
		winWidth=document.body.clientWidth;
		}
	if(window.innerHeight){
		winHeight=window.innerHeight;
		}
	else if((document.body)&&(document.body.clientHeight)){
		winHeight=document.body.clientHeight;
		}

	$('.nav ul li .li-a').hover(function(){
		$(this).parents('li').siblings('li').find('ul').hide();
		$(this).parents('li').find('ul').show();
	});
	$('.close-panel').click(function(){
		$(this).parents('.panel-wrap').hide();
		$('.read-left ul li').removeClass('cur');
	})
	$('.settingBtn').click(function(){
		if($('.setting').css('display')=='none'){
			$('.panel-wrap').hide();
			$('.setting').show();
			$('.read-left ul li').removeClass('cur');
			$(this).parents('li').addClass('cur');
		}else{
			$('.setting').hide();
			$('.panel-wrap').hide();
			$(this).parents('li').removeClass('cur');
		}
	});
	$('.cellphoneBtn').click(function(){
		if($('.cellphone').css('display')=='none'){
			$('.panel-wrap').hide();
			$('.cellphone').show();
			$('.read-left ul li').removeClass('cur');
			$(this).parents('li').addClass('cur');
		}else{
			$('.cellphone').hide();
			$('.panel-wrap').hide();
			$(this).parents('li').removeClass('cur');
		}
	});
	$('.right-pp').css('min-height',winHeight-$('.book-header').height()-40-20);
	$('.theme-list span').click(function(){
		$(this).siblings().removeClass('act');
		$(this).addClass('act');
	});
	$('.font-family span').click(function(){
		$(this).siblings().removeClass('act');
		$(this).addClass('act');
	});
	for(var i=0;i<$('.theme-list span').length;i++){
		$('.theme-'+i).click(function(){
			for(var j=0;j<$('.theme-list span').length;j++){
				$('body').removeClass('theme-'+j);
			}
			$('body').addClass('theme-'+($(this).index()-1));
		})
	};
	for(var i=0;i<3;i++){
		$('.yahei').click(function(){
			for(var j=0;j<4;j++){
				$('.read-mid').removeClass('font-family0'+j);
			}
			$('.read-mid').addClass('font-family0'+($(this).index()));
		})
	};
	var i=18;
	$('.font-size span.prev').click(function(){
		if(i>13){
			i-=2;
			$('.book-content').css('font-size',i);
			$('.font-size .lang').html(i);
		}
	});
	$('.font-size span.next').click(function(){
		if(i<35){
			i+=2;
			$('.book-content').css('font-size',i);
			$('.font-size .lang').html(i);
		}
	});
	$('.page-width span.prev').click(function(){
		if($('body').hasClass('w1280')){
			$('body').removeClass('w1280');
			$('body').addClass('w900');
			$('.page-width span.lang').html(900);
			$('.container').css('width','auto');
		}
		else if($('body').hasClass('w900')){
			$('body').removeClass('w900');
			$('body').addClass('w640');
			$('.page-width span.lang').html(640);
			$('.container').css('width','auto');
		}else{
			$('body').removeClass('w900');
			$('body').removeClass('w1280');
			$('body').addClass('w640');
			$('.page-width span.lang').html(640);
			$('.container').css('width','auto');
		}
	});
	$('.page-width span.next').click(function(){
		if($('body').hasClass('w640')){
			$('body').removeClass('w640');
			$('body').addClass('w900');
			$('.page-width span.lang').html(900);
		}
		else if($('body').hasClass('w900')){
			$('body').removeClass('w900');
			$('body').addClass('w1280');
			$('.page-width span.lang').html(1280);
			$('.container').css('width','auto');
		}else{
			$('body').removeClass('w640');
			$('body').removeClass('w900');
			$('body').removeClass('w1280');
			$('.page-width span.lang').html('%100');
			$('.container').css('width','auto');
		}
	});
	$('.all-qie:not(:first)').hide();
	$('.all-tit ul li').click(function(){
		$(this).addClass('cur');
		$(this).siblings().removeClass('cur');
		$('.all-qie').eq($(this).index()).show().siblings().hide();
	});
	$('.all-del').click(function(){
		$(this).parent().remove();
	})
	$('.select-con ul li a').click(function(){
		$(this).parent().addClass('cur');
		$(this).parent().siblings().removeClass('cur');
	})
	$('.rightt-paixu ul li').click(function(){
		$(this).addClass('cur');
		$(this).siblings().removeClass('cur');
	});
	$('.i-yiwen').hover(function(){
		$('.yiwen-tip').show();
	},function(){
		$('.yiwen-tip').hide();
	});
	$('.readd-top ul li').hover(function(){
		if($(this).find('.dhide').css('display')=='none'){
			$('.dhide').hide();
			$(this).find('.dhide').show();
		}
		else{
			$('.dhide').hide();
		}
	});
	$('.bgsinaRed').hover(function(){
		$('.sinak').show();
	},function(){
		$('.sinak').hide();
	});
	$('.bgwxGreen').hover(function(){
		$('.wxk').show();
	},function(){
		$('.wxk').hide();
	})
})  