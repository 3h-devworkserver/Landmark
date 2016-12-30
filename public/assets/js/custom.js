(function($) {


    $(window).resize(function() {
        var win = $(window).height() - parseInt($('.navbar').height());
        //console.log(parseInt($('.navbar').height()))
        win = win;
        //win = (win < 200) ? 350 : win;
        //return false;
        $('#intro').height(win);
        
        var win1 = $(window).height() - 20 - parseInt($('footer').height());
        win1 = win1
        $('.about #intro, .preparation-classes .university-wrapper, .search .search-page-wrapper').height(win1);
    });

 
    $(document).ready(function() {
        
        $('.more-options').click(function(){
            $(this).find('span').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
            $('#more-options-slide').slideToggle();
            return false;
        });  

        $(document).on('click','.social-icons .btn-share',function(){
            $('.social-list').toggleClass('show');
        })
     
    $('form#contactform').validate();
    $('form#eventform').validate();

//-------  contact form --------//
    $('form#contactform').on('submit',function(){

        if(!$('form#contactform .fullname').val() || !$('form#contactform .email').val()){
            $('form#contactform').validate();
            return false;
        }else{
            $('#imgloader').show();
            var datas = $('form#contactform').serialize()
               $.ajax({
                type: "POST",
                url: base_url+'/frontend/formsubmit',
                data: {
                         source : datas, 
                      },
               // dataType: 'json',
            })
           .done(function(data) { 
                $('#imgloader').hide()
           })
           .fail(function() { 
                $('#imgloader').hide()
                $('.errormsg').show()
                console.log('error');
             })
        }
     
    })
//-------end--------------------//
//-------  event form --------//
    $('form#eventform').on('submit',function(){

        if(!$('form#eventform .fullname').val() || !$('form#eventform .email').val() || !$('form#eventform .number').val()|| !$('form#eventform .address').val()|| !$('form#eventform .course').val()|| !$('form#eventform .qualification').val()){
            $('form#eventform').validate();
            return false;
        }else{
            $('#imgloader').show();
            var datas = $('form#eventform').serialize()
               $.ajax({
                type: "POST",
                url: base_url+'/newsform/submit',
                data: {
                         source : datas, 
                      },
               // dataType: 'json',
            })
           .done(function(data) { 
                $('#imgloader').hide()
           })
           .fail(function() { 
                $('#imgloader').hide()
                $('.errormsg').show()
                console.log('error');
             })
        }
     
    })
//-------end--------------------//

        var win = $(window).height() - parseInt($('.main-header').height());
   
        var win = $(window).height();
        win = win;
        //win = (win < 200) ? 350 : win;
        //return false;
        $('#intro').height(win);

        var win1 = $(window).height() - 20 - parseInt($('footer').height());
        var win2 = $(window).height() -  250 -parseInt($('footer').height()) - parseInt($('.main-header .navbar').height()) ;
        win1 = win1
        $('.about #intro, .preparation-classes .university-wrapper').height(win1);
        $('.search .search-page-wrapper').height(win2);
        




        $(window).bind("load resize scroll", function(e) {
            var y = $(window).scrollTop();

            $("#intro").filter(function() {
                return $(this).offset().top < (y + $(window).height()) &&
                    $(this).offset().top + $(this).height() > y;
            }).css('background-position', '0px ' + parseInt(-y / 5) + 'px');
        });

        var flag = true;
        $('.fifth.parallax').waypoint(function() {
            if (flag) {
                $(window).bind("scroll", function(e) {
                    var y = $(window).scrollTop();

                    $(".fifth.parallax").filter(function() {
                        return $(this).offset().top < (y + $(window).height()) &&
                            $(this).offset().top + $(this).height() > y;
                    }).css({
                        'background-position': '0px ' + parseInt(-y / 5) + 'px',
                        'height': '450px'
                    })

                });

                flag = false;
            }
        }, {
            offset: '100%'
        });



        var $window = $(window); //Window object

        var scrollTime = 1; //Scroll time
        var scrollDistance = 165; //Distance. Use smaller value for shorter scroll and greater value for longer scroll

        $window.on("mousewheel DOMMouseScroll", function(event) {

            event.preventDefault();

            var delta = event.originalEvent.wheelDelta / 120 || -event.originalEvent.detail / 3;
            var scrollTop = $window.scrollTop();
            var finalScroll = scrollTop - parseInt(delta * scrollDistance);

            TweenMax.to($window, scrollTime, {
                scrollTo: {
                    y: finalScroll,
                    autoKill: true
                },
                ease: Power1.easeOut, //For more easing functions see http://api.greensock.com/js/com/greensock/easing/package-detail.html
                autoKill: true,
                overwrite: 5
            });

        });

        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        //var slidesPerPage = 3; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: false,
            dots: true,
            loop: true,
            responsiveRefreshRate: 200,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function() {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
               items: 3,
                dots: false,
                nav: false,
                mouseDrag:false,

                // smartSpeed: 200,
                //slideSpeed : 500,
                //slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                responsiveRefreshRate: 100,
                responsiveClass:true,
                responsive:{
                  0:{
                      items:1,
                      nav:false,
                     
                   
                      //slideBy:1
                  },
                  600:{
                      // items:3,
                      // nav:false
                  },
                  1000:{
                      items:3,
                      // nav:true,
                      // loop:false
                  }
              }
            }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
            //if you set loop to false, you have to restore this next line
            var current = el.item.index;

            //if you disable loop you have to comment this block
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - (el.item.count / 2) - .5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }

            //end block

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });
    });


    /* detect touch */
    if ("ontouchstart" in window) {
        document.documentElement.className = document.documentElement.className + " touch";
    }
    if (!$("html").hasClass("touch")) {
        /* background fix */
        $(".parallax").css("background-attachment", "fixed");
    }




    $('.home a[href*="#"]:not([href="#"])').click(function() {

        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

//---------------australi page section-------------//
     size_li = $(".sections-wrap .sections").size();
    x=4;
    $('.sections-wrap .sections:lt('+x+')').show();
    
       $('.section-button .btn-readmore').click(function () {
           x= (x+4 <= size_li) ? x+4 : size_li;
           $('.sections-wrap .sections:lt('+x+')').show();
           if( x == size_li){
            $('.section-button').hide()
           }
       });

    //thumbnail slider
    // $('.thumnail-slider .owl-carousel').owlCarousel({
    //       loop:true,
    //       margin:30,
    //       nav: true,
    //       navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
    //       responsiveClass:true,
    //       responsive:{
    //           0:{
    //               items:1,
    //               nav:true
    //           },
    //           600:{
    //               items:3,
    //               nav:false
    //           },
    //           1000:{
    //               items:6,
    //               nav:true,
    //               loop:false
    //           }
    //       }
    //   })
    // var owl = $('.owl-carousel');
    // owl.owlCarousel({
    //     loop: true,
    //     items: 1,
    //     thumbs: true,
    //     thumbImage: false,
    //     thumbContainerClass: 'owl-thumbs',
    //     thumbItemClass: 'owl-thumb-item'
    // });




})(window.jQuery);
