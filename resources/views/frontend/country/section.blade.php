@extends('frontend.master')
<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head id="www-sitename-com" data-template-set="html5-reset">
@if(!empty($countrysection->title))    
<meta property="og:title" content="{{ $countrysection->title }}" />
<meta name="twitter:title" content="{{ $countrysection->title }}" />
@endif
<meta property="og:type" content="website" />
@if(!empty($countrysection->url))    
<meta property="og:url" content="{{URL::to('/section/australia/'.$countrysection->url)}}" />
@endif
@if(!empty($countrysection->featured_image))    
<meta property="og:image" content="{{ asset('img/country/'. $countrysection->featured_image ) }}" />
<meta name="twitter:image" content="{{ asset('img/country/'. $countrysection->featured_image ) }}" />
@endif
<meta property="og:site_name" content="LandMark" />
<meta name="twitter:creator" content="LandMark" />
<meta property="og:image:height" content="200" />
<?php 
if(!empty($countrysection->content)){
$pos=strpos($countrysection->content, ' ', 100);
$text = strip_tags( substr( $countrysection->content,0,$pos ) ); ?> 
<meta property="og:description" content="{!! $text !!}" />
<meta name="twitter:description" content="{!! $text !!}" />
<?php }
?>
@section('content')
<section class="main-wrapper single">
    <div class="signle-page-wrapper">
        @if(!empty($countrysection->header_image))
        <div class="page-style-1 bg-image" style="background-image:url({{ asset('img/country/'. $countrysection->header_image ) }});">
         </div>
         @endif
        <div class="container mt40">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                      <li><a href="{{ URL::to('country') }}">Country</a></li>
                      <li><a href="{{ URL::to('country/australia') }}">Australia</a></li>                      
                      <li class="active">australia</li>
                    </ol>
                </div>
             
            </div>

            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <h1 class="page-title">{{ $countrysection->title }}</h1>
                    <div class="single-page-image bg-image" style="background-image:url({{ asset('img/country/'. $countrysection->featured_image ) }} );"></div>
                    {!! $countrysection->content !!}
                </div>
                <div class="col-md-4 col-sm-5 sidebar-section">
                    <aside>
                        <div class="social-icons">
                        <ul class="list-unstyled social-list">
                        <li class="pinterest">
                            <a onclick="javascript:window.open('http://pinterest.com/pin/create/button/?url={{URL::to('/section/australia/'.$countrysection->url)}}')" href="javascript:;" class="pin-it-button" count-layout="horizontal">
                            <i class="fa fa-pinterest"></i></a>
                        </li>
                        <li class="facebook">
                            <a href="javascript:;" class="facebook" onclick="javascript:window.open( 'http://www.facebook.com/sharer/sharer.php?s=100&p[title]=<?php echo strip_tags(addslashes($countrysection->title));?>&p[url]=<?php echo urlencode( URL::to("/section/australia/".$countrysection->url));?>&p[images][0]=<?php echo urlencode( asset("img/country/". $countrysection->featured_image ) );?>', 'facebook-share-dialog', 'width=626,height=436'); return false;">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a target="_blank" href="javascript:;"  class=""  onclick="javascript:window.open('https://twitter.com/share?text=Check&url=&via=landmark', '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" >
                                <i class="fa fa-twitter"></i>
                            </a>

                        </li>
                        <li class="email">
                        <a href="mailto:?subject={{ $countrysection->title }}&amp;body=Check out this site {{ URL::to('/section/australia/'.$countrysection->url) }}."
                           title="Share by Email">
                          <i class="fa fa-paper-plane"></i>
                        </a>
                        </li>
                        </ul>
                        <button class="btn btn-primary btn-share">
                        <i class="fa fa-share"></i>
                        SHARE
                        </button>
                        </div>

                        <?php 
                        $sectionlists = DB::table('country_section')->where('c_id',$countrysection->c_id)->whereNotIn('id',[$countrysection->id])->get(); 
                        ?>
                        @if( $sectionlists )
                        <div class="sidebar-wrapper">
                            <h2 class="sidebar-title">related topics</h2>
                            @foreach( $sectionlists as $key => $list )
                            <div class="media">
                              <div class="media-left bg-image" style="background-image:url({{ asset('img/country/'. $list->featured_image ) }});"></div>
                              <div class="media-body">
                                <a href="{{ URL::to('/section/australia/'.$list->url ) }}">
                                    <h4 class="media-heading">{{ $list->title }}</h4>
                                    <div class="right-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </div>
                                    
                                </a>
                              
                              </div>
                            </div>
                           @endforeach
                        </div>
                        @endif
                    </aside>
                </div>
                
            </div>

        </div>
        <?php 
        $countrylist = DB::table('country')->whereNotIn('id',[$countrysection->c_id])->get(); 
        ?>
        @if( $countrylist )
        <div class="country-wrapper">
            <div class="container">
                <div class="row">
                    @foreach( $countrylist  as $key => $clist )
                    <div class="col-md-6 col-sm-6">
                        <div class="blocks bg-image" style="background-image:url({{ asset('img/country/'. $clist->featured_image ) }});">
                        <div class="block-content">
                            <h1><a href="{{ URL::to( 'country/'.$clist->url ) }}"><span>{{$clist->title}}</span> <span class="right-arrow"><i class="fa fa-angle-right"></i></span></a></h1>
                            {!! $clist->description !!}
                        </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        
    </div>
</section>

@stop