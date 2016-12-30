@extends('frontend.master')

@section('content')

@if($pagetop)
    @foreach($pagetop as $p)
    @if($p->ordering == 1)
    @if($p->boption == 'color' && $p->parallax != 'parallax')
    <section id="intro" class="">
    @else
    <section id="intro" class="parallax" style="background-image:url('{{ asset('/img/'.$p->featured_image) }}');">

    @endif

     <div class="container">
        <div class="home-container">
            <div class=" cover">
                <h1>{{ $p->static_title }}</span></h1>
                {!! $p->short_description !!}
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
                    <div class="pull-left"><a href="{{$p->url}}" class="btn btn-outline">know more</a></div>
                </div>

            </div>
        </div>
    </div>
                <a href="#second" class="down-arrow-mousestyle">
                    <div class="mouse-icon"><div class="wheel"></div></div>
                </a>
                
    </section>
    @endif
    @endforeach
@endif


@include('frontend.home.slider')

@foreach($pagetop as $page)
 @if($page->ordering == 2)
 @if($page->boption == 'color')
<section id="third" class="third-bg-image" style=" background-color:<?php echo $page->background_color; ?> ">
    @else
<section id="third" class="third-bg-image" style="background-image:url(<?php echo $page->background_image; ?>)" >
    @endif
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
            <h1>
                <small>{{ $page->sub_title }}</small>
                {{ $page->static_title }}
            </h1>
        </div>
        <div id="u801" class="featuredimg">
            <img src="{{ asset('/img/'.$page->featured_image) }}" alt="">
        </div>
    </div>
    <!--.story-->
</section>

@endif

@if($page->ordering == 3)
    <section id="forth">
         @if($page->boption == 'color')
    <div class="bg-image brain-bg" style="background-color:<?php echo $page->background_color?>"></div>

    @else
    <div class="bg-image brain-bg" style="background-image:url({{ asset('/img/'.$page->background_image) }});"></div>
    @endif
    <div class="container">
        <div class="language">
            <div class="box-wrap" id="u3436">
                <img width="178" height="117" alt="" src="{{ asset('assets/img/toefl.png') }}">
            </div>
            <div class="box-wrap" id="u3437">
                <img width="178" height="117" alt="" src="{{ asset('assets/img/ielts-logo.png') }}">
            </div>
            <!-- <div class="box-wrap">
                <img width="178" height="117" alt="" src="assets/img/sat-logo.png">
            </div>
            <div class="box-wrap">
                <img width="178" height="117" alt="" src="assets/img/gmat-logo.png">
            </div> -->
        </div>
        <div class="story text-center">
            <h1>{{ $page->static_title }}</h1>
            <div class="fixed-width-content">
                <p>
                    {!! $page->short_description !!}
                </p>
                
            </div>
            <a href="#" class="btn btn-outline">Know more</a>
            <a href="#fifth" class="down-arrow">
                <i class="fa fa-angle-down"></i>
            </a>

        </div>
        
    </div>
    <!--.story-->

</section>
@endif

@if($page->ordering == 4)
<section id="fifth" class="blue-bg">
    
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="cont text-center">
                <h1 class="">{{$page->static_title}}</h1>
                <div class="fixed-width-content">
                   {!! $page->short_description !!}
                </div>
                 <a href="{{ $page->url }}" class="btn btn-outline">Know more</a>
               
            </div>
        </div>
    </div>
</section>
@if($page->parallax == 'parallax' && $page->boption == 'img')
<div class="fifth parallax" style="background-image:url({{ asset('/img/'.$page->background_image)}}"></div>
@else
<div class="fifth" style="background-color:{{ $page->background_color }}"></div>
@endif
<section class="fifth-down blue-bg text-center">
<a href="#sixth" class="down-arrow">
        <i class="fa fa-angle-down"></i>
    </a>
    
</section>
@endif

@if($page->ordering == 5)
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
                        {!! $page->short_description !!}
                     </div>
                    
                    <a class="btn btn-outline" href="{{ $page->url }}">know more</a>
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

@include('frontend.home.contact')

@stop


