// JavaScript Document
$(document).ready(function(){
	
	var profileWindow='1';
	
	$(window).on('scroll',function(){
		scrollValue=$(window).scrollTop();
		if(scrollValue>154){
			$('.profile-container').css('position','fixed');
			$('.profile-container').css('right','0');
			$('.profile-container').css('top','0');
			$('.profile-container').css('height','100%');
		}
		else{
			if(profileWindow==1){
				$('.profile-container').css('position','relative');
				$('.profile-container').css('right','inherit');
			}
			$('.profile-container').css('top','inherit');
			$('.profile-container').css('height','700px');
		}
	});
	$('.profile-hide').on('click', function(){
		if(profileWindow=='1'){
			$('.profile-container').animate({marginRight:'-400px'});
			profileWindow='0';
			setTimeout(function(){
				$('.profile-container').css('position','fixed');
				$('.profile-container').css('right','0');
				$('.newsfeed-container').css('width','90%');
			},400);
		}
		else{
			$('.newsfeed-container').css('width','65%');
			$('.profile-container').animate({marginRight:'0px'});
			profileWindow='1';
		}
		
	});

});