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

	$('.nav ul li .li-a').click(function(){
		$(this).parents('li').siblings('li').find('ul').hide();
		$(this).parents('li').find('ul').show();
	});
	$('.nav ul li:nth-child(2) .li-a').hover(function(){
		$(this).parents('li').siblings('li').find('ul').hide();
		$(this).parents('li').find('ul').show();
	});
	$('.close-panel').click(function(){
		$(this).parents('.panel-wrap').hide();
		$('.read-left ul li').removeClass('cur');
	});
	$('.cataBth').click(function(){
		if($('.catalog').css('display')=='none'){
			$('.panel-wrap').hide();
			$('.catalog').show();
			$('.read-left ul li').removeClass('cur');
			$(this).parents('li').addClass('cur');
		}else{
			$('.catalog').hide();
			$('.panel-wrap').hide();
			$(this).parents('li').removeClass('cur');
		}
	});
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
	});
	$(".nav-hov-btn").hover(function(){
        $(this).find(".nav-all-con").show();
    },function(){
        $(this).find(".nav-all-con").hide();
    })
    $(".nav-list").hover(function(){
        $(this).find(".nav-list-con2").show();
        $(this).css("background","#f94a14");
    },function(){
        $(this).find(".nav-list-con2").hide();
        $(this).css("background","#FF6537");
    });
    $('.center-by ul li').click(function(){
    	$('.center-by ul li').removeClass('cur');
    	$(this).addClass('cur');
    });
    $('.cent-color li').click(function(){
    	$('.cent-color li').removeClass('cur');
    	$(this).addClass('cur');
    });
    var num = $('.center-input').val();
    $('.center-jian').click(function(){
    	if(num==2){
			num --;
			$('.center-input').val(num);
			$('.center-jian').addClass('center-jian1');
		}else if(num>2){
			num --;
    		$('.center-input').val(num);
    		$('.center-jian').removeClass('center-jian1');
		}
    	else{
    		$('.center-minus').addClass('center-jian1');
    		return false;
    	}
    });
    $('.center-jia').click(function(){
    	if(num>=1){
    		num ++;
    		$('.center-input').val(num);
    		$('.center-jian').removeClass('center-jian1');
    		$('.center-jia').removeClass('center-jia1');
    	}else{
    		$('.center-jian').addClass('center-jian');
    		$('.center-jia').addClass('center-jia');
    		return false;
    	}
    });
    $('.main-nav-wrap .main-nav li.first').hover(function(){
    	$('.classify-list').show();
    });
    $('.classify-list').hover(function(){
    	$('.classify-list').show();
    },function(){
    	$('.classify-list').hide();
    });
    $('.step2 li .accredit').hover(function(){
    	$('.accreditTip').show();
    },function(){
    	$('.accreditTip').hide();
    });
    $('.tagFilter a').click(function(){
    	$(this).addClass('act');
    	$(this).siblings().removeClass('act');
    });
    $('.filterTagBox').click(function(){
    	$('.mask,.maskUI1').show();
    });
    $('.new-fj').click(function(){
    	$('.mask,.maskUI2').show();
    });
    $('.workStateWrap .fmBox .fm span').click(function(){
    	$('.mask,.maskUI3').show();
    });
    $('.close-btn').click(function(){
    	$('.mask,.maskUI3').hide();
    });
    $('.closePopup,.confirmBtn a').click(function(){
    	$('.mask,.maskUI').hide();
    });
    $('.fj-del').click(function(){
    	$('.mask,.maskUI4').show();
    });
    $('.cg-del').click(function(){
    	$('.mask,.maskUI5').show();
    });
    $('.zs-btn').click(function(){
    	$('.mask,.maskUI6').show();
    });
    $('.cd-del').click(function(){
    	$('.mask,.maskUI7').show();
    });
    $('.hf-cg').click(function(){
    	$('.mask,.maskUI8').show();
    });
    $('.volume').click(function(){
    	if($('.volumeCon').css('display')=='none'){
    		$('.volumeCon').show();
    		$('.chapterCon').hide();
    	}else{
    		if($(this).hasClass('act')){
	    		$(this).removeClass('act');
	    		$(this).parents('.act-aa').find('.sectionWrap').slideUp();
	    	}else{
	    		$(this).addClass('act');
	    		$(this).parents('.act-aa').find('.sectionWrap').slideDown();
	    		$(this).parents('.act-aa').siblings().find('.sectionWrap').slideUp();
	    		$(this).parents('.act-aa').siblings().find('.volume').removeClass('act');
	    	}
    	}
    });
    $('.modify').click(function(){
    	$(this).parents('.mRightContent').find('.editWrap').show();
    	$(this).parents('.mRightContent').find('.viewWrap').hide();
    });
    $('.editWrap .save').click(function(){
    	$(this).parents('.mRightContent').find('.editWrap').hide();
    	$(this).parents('.mRightContent').find('.viewWrap').show();
    });
    $('.sectionWrap .sectionBox').click(function(){
    	$(this).parent().addClass('act');
    	$(this).parent().siblings().removeClass('act');
    	$('.volumeCon').hide();
    	$('.chapterCon').show();
    });
    $('.sectionList .sectionBox').click(function(){
    	$(this).parent().addClass('act');
    	$(this).parent().siblings().removeClass('act');
    });
    $('.workSetList .dib-wrap .button').click(function(){
    	if($('.workStateWrap .modify').hasClass('hidden')){
    		$('.workStateWrap .modify').show();
    		$('.workStateWrap .saved').hide();
    	}
    });
    $('.confirm a').click(function(){
    	if($('.workStateWrap .modify').css('display')=='block'){
    		$('.workStateWrap .modify').hide();
    		$('.workStateWrap .saved').show();
    	}
    });
    $('.j-attest').click(function(){
    	$('.mask').show();
    	$('.identy-pop').show();
    });
    $('.button1 a.pre').click(function(){
    	$('.mask').hide();
    	$('.identy-pop').hide();
    });
});  