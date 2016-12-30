@extends('frontend.master')
@section('content')
   <section class="main-wrapper single single-new">
        <div class="signle-page-wrapper">
            <div class="page-style-1 bg-image" style="background-image:url( {{ asset( 'img/country/'.$countryid->header_image)}} );">
            </div>
<?php 
$submenus = DB::table('country_menu')->where('country_id',$countryid->id)->get();
$sections = DB::table('country_section')->where('c_id',$countryid->id)->get();
?>

@if( count( $submenus ) > 0 )
            <div class="header-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <ul class="list-unstyled list-inline">
                                @foreach( $submenus as $key => $submenu)
                                <li>
                                    <a href="{{ URL::to( 'country/'. $url .'/'. $submenu->url ) }}">{{ $submenu->title }}</a>
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
                        <h1 class="page-title">ABOUT AUSTRALIA HEADLINE</h1>
                      
                        {!! $countryid->inner_description !!}
						@if( $sections )
                        <div class="more-info">
                            <h1 class="page-title">more on this section</h1>

                            <div class="row sections-wrap">
                            	@foreach( $sections as $key => $section )
                                <div class="col-md-6 sections" style="display:none;">
                                    <div class="media">
                                        <a href="{{ URL::to('/section/australia/'.$section->url ) }}">
                                        <div class="media-left bg-image" style="background-image:url({{ asset( 'img/country/'.$section->featured_image)}});">
                                            
                                        </div>
                                        <div class="media-body">
                                                <h4>{{ $section->title }}</h4>
                                            
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                
                                
                            </div>
                            <div class="more-button section-button">
                                    <a href="javascript:;" class="btn btn-readmore" role="button">
                                        <i class="fa fa-angle-right"></i>More</a>
                                </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="sidebar-wrapper">
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
                            $events = DB::table('news_and_events')->where('c_id',$countryid->id)->orderBy('id','ASC')->take(2)->get(); 
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
                                    <a href="{{ URL::to( 'news-and-events') }}" class="btn btn-readmore" role="button">
                                        <i class="fa fa-angle-right"></i>More</a>
                                </div>
                            </aside>
                            @endif
                        </div>
                    </div>
                </div>
               <?php 
               $blocks = DB::table('country_block')->where('cid',$countryid->id)->get();
               $universitieslist = DB::table('country_university')->where('c_id',$countryid->id)->get();
                ?>
                @if( count( $blocks ) > 0 )
                 @foreach( $blocks as $key => $block )
                        @if( $block->order == 0 )
                <div class="discount-wrapper">
                    <div class="row">
                        {!! $block->content !!}
                    </div>
                </div>
                @endif
                @endforeach
                @endif

                @if( count( $universitieslist) > 0)
                  <div class="universities-thumb-list">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-title">Universities</h1>
                            <ul class="list-unstyled">
                            @foreach( $universitieslist  as $key => $university )
                                <li>
                                    <div class="university-thumb bg-image" style="background-image:url({{ asset('img/country/university/'. $university->image) }});">
                                        
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="country-process-detail">
                    
                    <?php $accordion = DB::table('country_accordion')->where('cid',$countryid->id)->get(); ?>
                    <div class="row">
                        @if( count( $accordion ) > 0)
                        <div class="col-md-6">
                            <h1 class="page-title">10 things you must know about australia</h1>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              @foreach( $accordion as $key => $acc )
                              <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading{{ $acc->id }}">
                                  <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $acc->id }}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                      {{ $acc->title}}
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapse{{ $acc->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $acc->id }}">
                                  <div class="panel-body">
                                        {!! $acc->content !!}  
                                </div>
                                </div>
                              </div>
                               @endforeach 
                 
                            </div>
                        </div>
                        @endif
                        @if( count( $blocks ) > 0 )
                        @foreach( $blocks as $key => $block )
                        @if( $block->order == 1 ) 
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
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                @if( count( $blocks ) > 0 )
                 @foreach( $blocks as $key => $block )
                        @if( $block->order == 2 )    
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