$("#nav a").on('click',function(){
	$("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top-95 }, 800);
	return false;
});

/*$(window).on('scroll',function(){
	
	if ($(window).scrollTop()<=0) $("#header").removeClass("scrolled");
	else $("#header").addClass("scrolled");
	
}); */

$("#back_to_top").on('click',function(){
	$("html, body").animate({ scrollTop: 0 }, 600);
	return false;
});

$(".faq_title").on('click', function() {
	var x = $(this).attr("name");
	
	if (!$(this).hasClass('on')) {
		$(this).addClass('on');
		var src = $("."+x).attr("src").replace("chevron_down1.png", "chevron_up1.png");
        $("."+x).attr("src", src);
		$('.'+x+'_text').slideDown('fast');
	} else {
		$(this).removeClass('on');
		var src = $("."+x).attr("src").replace("chevron_up1.png", "chevron_down1.png");
        $("."+x).attr("src", src);
		$('.'+x+'_text').slideUp('fast');
	}
});


$(".next_button").on('click', function() {
	if ($(".gif_wrapper.on").next(".gif_wrapper").length > 0) {
		$(".gif_wrapper.on").addClass('prev').removeClass('on').next(".gif_wrapper").addClass("on").removeClass("next");
		$(".prev_button.off").removeClass("off");
	}
	
	if ($(".gif_wrapper.on").next(".gif_wrapper").length == 0) {
		$(".next_button").addClass('off');
	}
	
});

$(".prev_button").on('click', function() {
	if ($(".gif_wrapper.on").prev(".gif_wrapper").length > 0) {
		$(".gif_wrapper.on").addClass('next').removeClass('on').prev(".gif_wrapper").addClass("on").removeClass("prev");
		$(".next_button.off").removeClass("off");
	}
	
	if ($(".gif_wrapper.on").prev(".gif_wrapper").length == 0) {
		$(".prev_button").addClass('off');
	}
});


$("#send_contact_button").on('click',function(){
		
	$.ajax({
		url:'/php/contact.php',
		type:'post',
		data:{
			name: $("#contact_name").val(),
			email: $("#contact_email").val(),
			phone: $("#contact_phone").val(),
			message: $("#contact_message").val()			
		},
		success:function(resp) {
			alert(resp);
			$("#contact_name, #contact_email, #contact_phone, #contact_message").val('');
		}
	});
	return false;
});