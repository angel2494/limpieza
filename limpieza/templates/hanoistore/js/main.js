/**
* @package Helix3 Framework
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2015 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
jQuery(function($) {

    var $body = $('body'),
    $wrapper = $('.body-innerwrapper'),
    $toggler = $('#offcanvas-toggler'),
    $close = $('.close-offcanvas'),
    $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event){
        event.preventDefault();
        stopBubble (event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event){
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function(){
        $body.addClass('offcanvas');
        $wrapper.on('click',offCanvasClose);
        $close.on('click',offCanvasClose);
        $offCanvas.on('click',stopBubble);

    };

    var offCanvasClose = function(){
        $body.removeClass('offcanvas');
        $wrapper.off('click',offCanvasClose);
        $close.off('click',offCanvasClose);
        $offCanvas.off('click',stopBubble);
    };

    var stopBubble = function (e) {
        e.stopPropagation();
        return true;
    };

    //Mega Menu
    $('.sp-megamenu-wrapper').parent().parent().css('position','static').parent().css('position', 'relative');
    $('.sp-menu-full').each(function(){
        $(this).parent().addClass('menu-justify');
    });

    //Sticky Menu
    $(document).ready(function(){
        $("body.sticky-header").find('#sp-navigation').sticky({topSpacing:0})
    });

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    
    $(document).on('click', '.sp-rating .star', function(event) {
        event.preventDefault();

        var data = {
            'action':'voting',
            'user_rating' : $(this).data('number'),
            'id' : $(this).closest('.post_rating').attr('id')
        };

        var request = {
                'option' : 'com_ajax',
                'plugin' : 'helix3',
                'data'   : data,
                'format' : 'json'
            };

        $.ajax({
            type   : 'POST',
            data   : request,
            beforeSend: function(){
                $('.post_rating .ajax-loader').show();
            },
            success: function (response) {
                var data = $.parseJSON(response.data);

                $('.post_rating .ajax-loader').hide();

                if (data.status == 'invalid') {
                    $('.post_rating .voting-result').text('You have already rated this entry!').fadeIn('fast');
                }else if(data.status == 'false'){
                    $('.post_rating .voting-result').text('Somethings wrong here, try again!').fadeIn('fast');
                }else if(data.status == 'true'){
                    var rate = data.action;
                    $('.voting-symbol').find('.star').each(function(i) {
                        if (i < rate) {
                           $( ".star" ).eq( -(i+1) ).addClass('active');
                        }
                    });

                    $('.post_rating .voting-result').text('Thank You!').fadeIn('fast');
                }

            },
            error: function(){
                $('.post_rating .ajax-loader').hide();
                $('.post_rating .voting-result').text('Failed to rate, try again!').fadeIn('fast');
            }
        });
    });

    //tab
    $('.tabs .tab a').click(function(){
        $(this).parent().parent().find('a.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent().parent().parent().find('.item_tab.active').removeClass('active');
        $(this).parent().parent().parent().find('.item_tab.'+$(this).parent().attr('rel')).addClass('active');
        return false;
    });

    $('.tabs .list_label li:first-child a').addClass('active');
    $('.tabs .content_tab .item_tab:first-child').addClass('active');

    //slider deals
    $('.home-1 .list_deals .slider').bxSlider({
        pager: false,
        controls: false,
        auto: true,
        pause: 6000,
        minSlides: 1,
        maxSlides: 5,
        moveSlides: 1,
        slideWidth: 226,
        slideMargin: 10
    });
    $('.vs_categories_vm .slider').bxSlider({
        pager: false,
        auto: true,
        pause: 6000,
        minSlides: 1,
        maxSlides: 6,
        moveSlides: 1,
        slideWidth: 226,
        slideMargin: 10,
        nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
        prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
    });
	if($(window).width()>1024) {
		$('.home-2 .list_deals .slider').bxSlider({
			pager: false,
			auto: true,
			pause: 6000,
			minSlides: 3,
			maxSlides: 3,
			moveSlides: 1,
			slideWidth: 280,
			slideMargin: 10,
			nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
			prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
		});
	} else if($(window).width()>=768 && $(window).width()<=1024) {
		$('.home-2 .list_deals .slider').bxSlider({
			pager: false,
			auto: true,
			pause: 6000,
			minSlides: 2,
			maxSlides: 2,
			moveSlides: 1,
			slideWidth: 280,
			slideMargin: 10,
			nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
			prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
		});
	} else {
		$('.home-2 .list_deals .slider').bxSlider({
			pager: false,
			auto: true,
			pause: 6000,
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 1,
			slideWidth: 280,
			slideMargin: 10,
			nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
			prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
		});
	}
	if($(window).width()>=768) {
		$('.home-3 .list_deals .slider, .vs_slider_products .slider').bxSlider({
			pager: false,
			auto: true,
			pause: 60000,
			minSlides: 2,
			maxSlides: 2,
			moveSlides: 1,
			slideWidth: 280,
			slideMargin: 10,
			nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
			prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
		});
	} else {
		$('.home-3 .list_deals .slider, .vs_slider_products .slider').bxSlider({
			pager: false,
			auto: true,
			pause: 60000,
			minSlides: 1,
			maxSlides: 1,
			moveSlides: 1,
			slideWidth: 280,
			slideMargin: 10,
			nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
			prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
		});
	}
    //slider article
    $('.sppb-addon .recent_articles .sliders').bxSlider({
        pager: false,
        auto: true,
        pause: 3000,
        minSlides: 1,
        maxSlides: 3,
        moveSlides: 1,
        slideWidth: 370,
        slideMargin: 30,
        nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
        prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
    });

    $('select.autoSubmit').on('change', function() {
        this.form.submit();
    });

    $('#sp-top3 h2').click(function(){
        $(this).parent().find('.VMmenu').slideToggle();
    });

    $('.category-view .icon_switch li').click(function(){
       $('.category-view .icon_switch li.active').removeClass('active');
        $(this).addClass('active');
        $('.category-view .item_switch.active').removeClass('active');
        $('.category-view .item_switch.'+$(this).attr('rel')).addClass('active');
    });

    //slider team
    $('.vs_teams .slider').bxSlider({
        pager: false,
        auto: true,
        pause: 3000,
        minSlides: 1,
        maxSlides: 4,
        moveSlides: 1,
        slideWidth: 278,
        slideMargin: 20,
        nextText: '<i class="zmdi zmdi-chevron-right zmdi-hc-fw"></i>',
        prevText: '<i class="zmdi zmdi-chevron-left zmdi-hc-fw"></i>'
    });

    // Skills - Percent Bar
    function pattiskills() {
        jQuery('.skillbar').each(function(){
            var barwidth = jQuery(this).attr('data-percent');
            jQuery(this).waypoint(function() {
                    jQuery(this).find('.skillbar-bar').animate({
                        width: barwidth
                    },2000);
                    jQuery(this).find('.skill-bar-percent').animate({
                        'left':barwidth,
                        'margin-left': '-19px',
                        'opacity': 1
                    }, 2000);
                },
                {
                    offset: '90%',
                    triggerOnce: true
                });
        });
    }
    jQuery(document).ready(function() {
        pattiskills();
    });

    $(window).load(function() {
        // Animate loader off screen
        $(".dor-page-loading").fadeOut("slow");;
    });
});