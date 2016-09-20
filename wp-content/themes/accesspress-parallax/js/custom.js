jQuery(document).ready(function($){
    var headerHeight = $('#masthead').outerHeight();
    var footerHeight = $('#colophon').outerHeight(); // added by KH

    $('#go-top, .next-page').localScroll({
        offset: {
        top: -headerHeight
     }
    });

	// added by KH
    $('#content').css('min-height', screen.availHeight-footerHeight);

    $(window).scroll(function(){
        if($(window).scrollTop() > 200){
            $('#go-top').fadeIn();
        }else{
            $('#go-top').fadeOut();
        }
    });

	$('.home .single-page-nav.nav').onePageNav({
		currentClass: 'current',
    	changeHash: false,
    	scrollSpeed: 1500,
    	scrollOffset: headerHeight,
    	scrollThreshold: 0.5,
	});

    $('.single-page-nav.nav a').click(function(){
        $('.single-page-nav.nav').hide();
    });

	$(window).resize(function(){
    	var headerHeight = $('#masthead').outerHeight();
    	$('.parallax-on #content').css('padding-top', headerHeight);

    	$('.slider-caption').each(function(){
    	var cap_height = $(this).actual( 'outerHeight' );
    	$(this).css('margin-top',-(cap_height/2));
    	});

		// added by KH
		// make same class name to register, login, losw
		if($(".addedbykh.joinus").length){	// -40 is margin
			$("#join-cover").height($("#main").height()-40);
		}
    }).resize();

    $('#main-slider .overlay').prependTo('#main-slider .slides');

    $('.testimonial-slider').bxSlider({
        auto:true,
        speed: 1000,
        pause: 8000,
        pager:false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });

    $('.team-slider').bxSlider({
        auto:false,
        pager:false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>',
        moveSlides : 1,
        minSlides: 2,
        maxSlides: 7,
        slideWidth: 140,
        slideMargin: 15,
        infiniteLoop: false,
        hideControlOnEnd: true
    });

    $('.team-content').each(function(){
        $(this).find('.team-list:first').show();
    });
    
    $('.team-tab').each(function(){
        $(this).find('.team-image:first').addClass('active');
    });

    $('.team-tab .team-image').on('click', function(){
        $(this).parents('.team-listing').find('.team-image').removeClass('active');
        $(this).parents('.team-listing').find('.team-list').hide();
        $(this).addClass('active');
        var teamid = $(this).attr('id');
        $('.team-content .'+teamid).fadeIn();
        return false;
    });

    $(window).bind('load',function(){
        $('.googlemap-content').hide();  
    });
    
    var open = false;
    $('.googlemap-toggle').on('click', function(){
        if(!open){
        open = true;
        }
        $('.googlemap-content').slideToggle();
        $(this).toggleClass('active');
    });

    $('.social-icons a').each(function(){
    var title = $(this).attr('data-title')
    $(this).find('span').text(title);
    });

    $('.gallery-item a').each(function(){
        $(this).addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
    });
    
    $(".fancybox-gallery").nivoLightbox();

    $('.menu-toggle').click(function(){
        $(this).next('ul').slideToggle();
    });

    $("#content").fitVids();

	// added by KH
	$("a#btn-delete").click(function( event ){
		event.preventDefault();

		$confirmation = confirm("Delete this item?");
		if($confirmation == false) return;
		
		var argPostId = $(this).attr('value');
		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: {
				'action': 'MyAjaxFunctionDeletePost',
				'postData': argPostId,
			},
			success: function(data, textStatus, XMLHttpRequest){
				location.reload();	

			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}   		
		});
		
	});

	// added by KH
	$("a#btn-delete-single").click(function( event ){
		event.preventDefault();

		$confirmation = confirm("Delete this item?");
		if($confirmation == false) return;
		
		var argPostId = $(this).attr('value');
		
		$.ajax({
			
			url: '/wp-admin/admin-ajax.php',
			data: {
				'action': 'MyAjaxFunctionDeletePost',
				'postData': argPostId,
			},
			success: function(data, textStatus, XMLHttpRequest){
				//window.location.href = document.referrer;
				window.location.href = 'http://www.busan-life.com/buy-sell/';
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}   		
		})
	});

	// added by KH
	$("a.bbp-topic-trash-link").click(function( event ){
		event.preventDefault();

		var confirmation = confirm("Delete this topic?");
		if(confirmation == false) return;

		var targetHref = $(this).attr('href');

		var targetAction = getParameterByName('action', targetHref);
		var targetSub_Action = getParameterByName('sub_action', targetHref);
		var targetTopic_Id = getParameterByName('topic_id', targetHref);
		var target_Wpnonce = getParameterByName('_wpnonce', targetHref);
		
		$.ajax({
			url: window.location.href,
			data: {
				'action' : targetAction,
				'sub_action' : targetSub_Action,
				'topic_id' : targetTopic_Id,
				'_wpnonce' : target_Wpnonce
			},
			success: function(data, textStatus, XMLHttpRequest){
				window.location.href = 'http://www.busan-life.com/question-answer/';
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				window.location.href = 'http://www.busan-life.com/question-answer/';
			}
		});
	});

	// added by KH
	$("a.bbp-reply-trash-link").click(function( event ){
		event.preventDefault();

		var confirmation = confirm("Delete this reply?");
		if(confirmation == false) return;

		var targetHref = $(this).attr('href');

		var targetAction = getParameterByName('action', targetHref);
		var targetSub_Action = getParameterByName('sub_action', targetHref);
		var targetTopic_Id = getParameterByName('reply_id', targetHref);
		var target_Wpnonce = getParameterByName('_wpnonce', targetHref);
		
		$.ajax({
			url: window.location.href,
			data: {
				'action' : targetAction,
				'sub_action' : targetSub_Action,
				'reply_id' : targetTopic_Id,
				'_wpnonce' : target_Wpnonce
			},
			success: function(data, textStatus, XMLHttpRequest){
				window.location.href = document.referrer;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
				window.location.href = document.referrer;
			}
		});
	});


	// added by KH
	$('.detail-visibility-toggle-link').on( 'click', function( event ) {
		event.preventDefault();

		$( this ).parent().siblings( '.detail-container' ).show().addClass( 'detail-visibility-settings-open' );

		$( this ).parent().hide().addClass( 'detail-visibility-settings-hide' );

		var uname = $("#signup_username").val();
		$("#field_1").val(uname);

		$("#join-cover").height($("#main").height()-40);

	});

	// added by KH
	$('#signup_form').submit(function(event){

		if($('#field_1').val() == '')  {
			var uname = $("#signup_username").val();
			$("#field_1").val(uname);
		}

		return true;

	});

    $(window).on('load',function(){
        $('.blank_template').each(function(){
        $(this).parallax('50%',0.4, true);
        });
        
        $('.action_template').each(function(){
        $(this).parallax('50%',0.3, true);
        });
    });
    
});


function getParameterByName(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	    results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

