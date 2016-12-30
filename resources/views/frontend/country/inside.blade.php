@extends('frontend.master')
@section('content')
    <section class="main-wrapper single single-new">
        <div class="signle-page-wrapper">
            <div class="page-style-1 bg-image" style="background-image:url({{ asset( 'img/country/'.$countrymenu->header_image ) }});">
            </div>
			@if( $all )
            <div class="header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled list-inline">
                                @foreach( $all as $key => $submenu)
                                <li class="<?php if($submenu->url == $countrymenu->url ){ echo 'active'; }?>">
                                    <a href="{{ URL::to( 'country/australia/'. $submenu->url ) }}">{{ $submenu->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="container mt40">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{ URL::to('country') }}">Country</a></li>
                            <li class="active">australia</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <h1 class="page-title">{{ $countrymenu->sub_title }}</h1>
                        <div class="country-description">
                            {!! $countrymenu->content !!}
                            
                        </div>

                        
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="sidebar-wrapper">
                        	<aside>
			                            <div class="discount-content">
			                                <div class="discount-desc">
			                                    <h1>20% discount</h1>
			                                    <h2>on  ilets preparation classes</h2>
			                                </div>
			                                
			                                <a href="#" class="btn btn-readmore" role="button">
			                                    <i class="fa fa-angle-right"></i>
			                                </a>
			                            </div>
			                       
							</aside>
                            <aside>
                                <h2 class="sidebar-title">education in australia</h2>
                                <ul class="list-unstyled text-list">
                                    <li>
                                        <a href="#">Advantages of Studying in Australia.</a>
                                    </li>
                                    <li>
                                        <a href="#">Eligibility Entrance Test.</a>
                                    </li>
                                    <li>
                                        <a href="#">Advantages of Studying in Australia.</a>
                                    </li>
                                    <li>
                                        <a href="#">Available Courses in Australia</a>
                                    </li>
                                    <li>
                                        <a href="#">Top 10 Universities.</a>
                                    </li>
                                    <li>
                                        <a href="#">Advantages of Studying in Australia.</a>
                                    </li>
                                    <li>
                                        <a href="#">Top 10 Universities.</a>
                                    </li>
                                </ul>
                                <div class="more-button">
                                    <a href="#" class="btn btn-readmore" role="button">
                                        <i class="fa fa-angle-right"></i>More</a>
                                </div>
                            </aside>
                                  <?php 
                            $events = DB::table('news_and_events')->where('c_id',$countrymenu->id)->orderBy('id','ASC')->take(2)->get(); 
                            ?>
                            @if( count( $events) > 0 )
                            <aside class="event-aside">
                                <h2 class="sidebar-title">EVENTS &amp; SEMINARS</h2>
                                @foreach( $events as $key => $event )
                                <div class="media">
                                    <div class="media-left bg-image" style="background-image:url({{ asset('img/newsandevents/'.$event->image) }});"></div>
                                    <div class="media-body">
                                        <a href="{{ URL::to( 'news-and-events/'.$event->slug ) }}">
                                            <h4 class="media-heading">{{ $event->title }}</h4>
                                        </a>
                                        <?php $date = $event->e_date; 
                                            $ndate = explode('-',$date);
                                            $monthNum  = $ndate['1'];
                                            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                                            $monthName = $dateObj->format('F');
                                        ?>
                                        <div class="date">
                                            {{ $ndate['2']}}<sup>th</sup> {{ $monthName }}, {{ $ndate['0']}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="more-button">
                                    <a href="{{ URL::to( 'news-and-events' ) }}" class="btn btn-readmore" role="button">
                                        <i class="fa fa-angle-right"></i>More</a>
                                </div>
                            </aside>
                            @endif
                        </div>
                    </div>
                </div>

              <?php    
              $blocks = DB::table('country_block')->where('cid',$countrymenu->id)->get();
 ?>  @if( count( $blocks ) > 0 )
                 @foreach( $blocks as $key => $block )
                        @if( $block->order == 1 )
             
                <div class="country-process-detail">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="session-block">
                                <div class="panel panel-default">
                                   <div class="panel-body">
                                    <div class="bg-image" style="background-image:url({{ asset('img/country/static/'.$block->featured_image) }});"></div>
                                    <div class="session-content">
                                        <div class="left-content">
                                            {!! $block->content !!}
                                        </div>
                                        <div class="right-content">
                                            <a href="#" class="btn btn-blue">
                                                Register Now
                                            </a>
                                        </div>
                                    </div>
                                   
                                  </div>
                                
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="session-block">
                                <div class="panel panel-default">
                                  <div class="panel-body">
                                    <div class="bg-image" style="background-image:url({{ asset('img/country/static/'.$block->featured_image) }});"></div>
                                    <div class="session-content">
                                        <div class="left-content">
                                            {!! $block->content !!}
                                        </div>
                                        <div class="right-content">
                                            <a href="#" class="btn btn-blue">
                                                Register Now
                                            </a>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
				@endif	
				@if( $block->order == 2)
                <div class="call-to-action">
                    <div class="row">
                        <div class="col-md-12">
                           {!! $block->content !!}
                        </div>
                    </div>
                </div>
                @endif
@endforeach
@endif

            </div>
        </div>
    </section>
@stop