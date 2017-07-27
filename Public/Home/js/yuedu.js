$(function(){
	var readLeft = $('.read-left').offset().top;
	$(window).scroll(function(){
		var tt = $(window).scrollTop();
		if(tt>1){
			$('.read-right a.goTop').show();
		}else{
			$('.read-right a.goTop').hide();
		};
		if(tt>readLeft){
			$('.read-left').css({'position':'fixed','top':'0'});
		}else{
			$('.read-left').css({'position':'relative'});
		}
	});
})  