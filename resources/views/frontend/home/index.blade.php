@extends('frontend.master')

@section('content')
<script type="text/javascript">

$(document).ready(function(){
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
})
</script>
@if($pagetop)
    @foreach($pagetop as $p)
    @if($p->ordering == 0)
    @if($p->boption == 'color' && $p->parallax != 'parallax')
    <section id="intro" class="">
    @else
    <section id="intro" class="parallax" style="background-image:url('{{ asset('/img/'.$p->background_image) }}');">

    @endif

     <div class="container">
        <div class="home-container">
            <div class=" cover">
                <h1>{{ $p->static_title }}</span></h1>
                {!! $p->description !!}
                <div class="btn-grp">
                    <div class="pull-left">
                        <ul class="list-unstyled list-inline social-links">
                            @if($sociallink->facebook != '#')
                            <li class="facebook"><a href="{{$sociallink->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($sociallink->twitter != '#')
                            <li class="twitter"><a href="{{$sociallink->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($sociallink->google_plus != '#')
                            <li class="google"><a href="{{$sociallink->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if($sociallink->youtube != '#')
                            <li class="youtube"><a href="{{$sociallink->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($sociallink->tumblr != '#')
                            <li class="tumblr"><a href="{{$sociallink->tumblr}}"><i class="fa fa-tumblr"></i></a></li>
                            @endif
                            @if($sociallink->pinterest != '#')
                            <li class="pinterest"><a href="{{$sociallink->pinterest}}"><i class="fa fa-pinterest"></i></a></li>
                            @endif
                            @if($sociallink->linkedin != '#')
                            <li class="linkedin"><a href="{{$sociallink->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($sociallink->vimeo != '#')
                            <li class="vimeo"><a href="{{$sociallink->vimeo}}"><i class="fa fa-vimeo"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="pull-left"><a href="{{ URL::to( $p->url )}}" class="btn btn-outline">know more</a></div>
                </div>

            </div>

               <a href="#second" class="down-arrow">
                    <i class="fa fa-angle-down"></i>
                </a>
        </div>
    </div>
             
                <!--  <a href="#second" class="down-arrow-mousestyle">
                    <div class="mouse-icon"><div class="wheel"></div></div>
                </a> -->
                
    </section>
    @endif
    @endforeach
@endif


@include('frontend.home.slider')

@foreach($pagetop as $page)
 @if($page->ordering == 1)
 @if($page->boption == 'color')
<section id="third" class="" style=" background-color:<?php echo $page->background_color; ?> ">
    @else
<section id="third" class="" style="background-image:url(<?php echo $page->background_image; ?>)" >
    @endif
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h1>
                <small>{{ $page->sub_title }}</small>
                {{ $page->static_title }}
            </h1>
        </div>
       <!--  <div id="u801" class="featuredimg col-md-12">
            <img src="{{ asset('/img/'.$page->featured_image) }}" alt="">
        </div> -->
    </div>
    <!--.story-->
</section>
<section class="third-bg-wrap">
    <div style="background-image:url({{ asset('/img/'.$page->featured_image) }});" class="third-bg-image animateme scrollme hidden-xs" data-when="enter" data-from="0" data-to="0.5" data-opacity="1" data-translatey="-240">
    </div>
    <div style="background-image:url({{ asset('/img/'.$page->featured_image) }});" class="third-bg-image third-bg-image-mbl hidden-md hidden-sm hidden-lg visible-xs">
     </div>   
    
</section>
@endif

@if($page->ordering == 2)
    <section id="forth">
         @if($page->boption == 'color')
    <div class="bg-image brain-bg" style="background-color:<?php echo $page->background_color?>"></div>

    @else
    <div class="bg-image brain-bg" style="background-image:url({{ asset('/img/'.$page->background_image) }});"></div>
    @endif
    <div class="container">
        <div class="language scrollme hidden-xs hidden-sm">
            <div 
                class="box-wrap animateme"
                data-when="enter"
                data-from="0"
                data-to="0.5"
                data-opacity="1"
                data-translatex="955"
                data-translatey="470"
                
            >
                <img width="178" height="117" alt="" src="{{ asset('assets/img/toefl.png') }}">
            </div>
            <div class="box-wrap animateme"
                data-when="enter"
                data-from="0"
                data-to="0.5"
                data-opacity="1"
                data-translatex="-955"
                data-translatey="470"
            >
                <img width="178" height="117" alt="" src="{{ asset('assets/img/ielts-logo.png') }}">
            </div>
        </div>
         <div class="language language-mbl hidden-md hidden-lg visible-xs visible-sm">
            <div class="box-wrap">
                <img width="178" height="117" alt="" src="{{ asset('assets/img/toefl.png') }}">
            </div>
            <div class="box-wrap"
                >
                <img width="178" height="117" alt="" src="{{ asset('assets/img/ielts-logo.png') }}">
            </div>
      
        </div>
        <div class="story text-center">
            <h1>{{ $page->static_title }}</h1>
            <div class="fixed-width-content">
                <p>
                    {!! $page->description !!}
                </p>
                
            </div>
            <a href="{{ URL::to( $page->url )}}" class="btn btn-outline">Know more</a>
            <a href="#fifth" class="down-arrow">
                <i class="fa fa-angle-down"></i>
            </a>

        </div>
        
    </div>
    <!--.story-->

</section>
@endif

@if($page->ordering == 3)
<section id="fifth" class="blue-bg">
    
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="cont text-center">
                <h1 class="">{{$page->static_title}}</h1>
                <div class="fixed-width-content">
                   {!! $page->description !!}
                </div>
                 <a href="{{ $page->url }}" class="btn btn-outline">Know more</a>
               
            </div>
        </div>
    </div>
</section>
@if($page->parallax == 'parallax' && $page->boption == 'img')
<div class="fifth parallax" style="background-image:url({{ asset('/img/'.$page->background_image)}});"></div>
@else
<div class="fifth" style="background-color:{{ $page->background_color }}"></div>
@endif
<section class="fifth-down blue-bg text-center">
<a href="#sixth" class="down-arrow">
        <i class="fa fa-angle-down"></i>
    </a>
    
</section>
@endif

@if($page->ordering == 4)
<section id="sixth">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                 
                    <h1 class="text-center">{{ $page->static_title }}</h1>
                    <div class="fixed-width-content">
                        <!-- <p class="sub-heading text-center">
                            Our services first started by assisting and sending students to Canada and, after six months of operation, we expanded our contacts with universities. 
                        </p> -->
                        {!! $page->description !!}
                     </div>
                    
                    <a class="btn btn-outline" href="{{ URL::to( $page->url )}}">know more</a>
                    <a href="#seventh" class="down-arrow">
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <img src="{{ asset('img/'.$page->featured_image) }}">
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

</section>  
@endif
@endforeach
@if($p->ordering == 5)
<section id="seventh" class="contact-wrapper bg-image" style="background-image:url( {{ asset('/img/'.$page->background_image)}} );">  
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                {!! $p->description !!}
             <ul class="list-unstyled list-inline social-links">
                            @if($sociallink->facebook != '#')
                            <li class="facebook"><a href="{{$sociallink->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($sociallink->twitter != '#')
                            <li class="twitter"><a href="{{$sociallink->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($sociallink->google_plus != '#')
                            <li class="google"><a href="{{$sociallink->google_plus}}"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if($sociallink->youtube != '#')
                            <li class="youtube"><a href="{{$sociallink->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($sociallink->tumblr != '#')
                            <li class="tumblr"><a href="{{$sociallink->tumblr}}"><i class="fa fa-tumblr"></i></a></li>
                            @endif
                            @if($sociallink->pinterest != '#')
                            <li class="pinterest"><a href="{{$sociallink->pinterest}}"><i class="fa fa-pinterest"></i></a></li>
                            @endif
                            @if($sociallink->linkedin != '#')
                            <li class="linkedin"><a href="{{$sociallink->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($sociallink->vimeo != '#')
                            <li class="vimeo"><a href="{{$sociallink->vimeo}}"><i class="fa fa-vimeo"></i></a></li>
                            @endif
            </ul>
              
                <a href="#home" class="up-arrow">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </div>
    </div>
</section>
 @endif
@stop


