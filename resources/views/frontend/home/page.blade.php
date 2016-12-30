@extends('frontend.master')
@section('content')
<?php //echo '<pre>'; print_r($pagedetails); ?>
@if($pagedetails )
@foreach($pagedetails as $page)
  @if($page->slug == 'about')
<section id="intro" class="bg-image about-wrapper" style="background-image:url({{ asset('/img/'.$page->featured_image)}});">
    <div class="container">
        <div class="row home-container">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <h1>{{ $page->title }}</h1>
               {!! $page->description !!}
                <div class="row btn-grp">
                    <div class="col-lg-12 col-md-12 col-sm-12">
						<ul class="list-unstyled list-inline social-links">
                            @if($sociallink->facebook != '#')
                            <li class="facebook"><a href="{{$sociallink->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if($sociallink->twitter != '#')
                            <li class="twitter"><a href="{{$sociallink->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if($sociallink->google_plus != '#')
                            <li class="google"><a href="{{$sociallink->google_plus}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            @endif
                            @if($sociallink->youtube != '#')
                            <li class="youtube"><a href="{{$sociallink->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            @endif
                            @if($sociallink->tumblr != '#')
                            <li class="tumblr"><a href="{{$sociallink->tumblr}}" target="_blank"><i class="fa fa-tumblr"></i></a></li>
                            @endif
                            @if($sociallink->pinterest != '#')
                            <li class="pinterest"><a href="{{$sociallink->pinterest}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            @endif
                            @if($sociallink->linkedin != '#')
                            <li class="linkedin"><a href="{{$sociallink->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            @endif
                            @if($sociallink->vimeo != '#')
                            <li class="vimeo"><a href="{{$sociallink->vimeo}}" target="_blank"><i class="fa fa-vimeo"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    
                </div>
				

            </div>
        </div>
    </div>
</section>
@elseif($page->slug == 'contact')
<?php $address = DB::table('generals')->select('map_address','map_lat','map_lon')->first();?>
<section class="main-wrapper contact">
    <div class="contact-page-wrapper">
        
        <div class="container">  
        <div class="row">
            <div class="col-md-12">
                <div class="map-area" id="map" style="height:300px;">
                    <input type="hidden" class="lat" value="{{$address->map_lat}}">
                    <input type="hidden" class="lon" value="{{$address->map_lon}}">
                    <input type="hidden" class="address" value="{{$address->map_address}}">
                    <!-- <iframe width="1219" height="300" frameborder="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;q=Landmark%20Education%20Consultancy%2C%20Putalisadak%2C%20Kathmandu%2C%20Nepal&amp;aq=0&amp;ie=UTF8&amp;t=m&amp;z=12&amp;iwloc=A&amp;output=embed" marginwidth="0" marginheight="0" scrolling="no" class="actAsDiv"></iframe> -->
                </div>
                
            </div>
        </div> 
        

         <div class="contact-form">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <form method="post" action="javascript:;" name="contactform" id="contactform">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control required fullname" name="fullname" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control required email" name="email" placeholder="Enter Email">
                          </div>
                          
                          <div class="form-group">
                            <label>Cell Phone:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                          </div>
                            <div class="form-group">
                                <label>Message:</label>
                                <textarea name="message" id="" cols="30" rows="10"  class="form-control" placeholder="Enter Your Message"></textarea>
                            </div>
                          <input type="submit" class="btn btn-default" value="Submit">
                          <img src="{{ asset('img/loading.gif') }}" id="imgloader" style="display:none;" height="20" width="20">
                        </form>
                        <div class="errormsg" style="display:none;">Something Went Wrong!</div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        {!! $page->description !!}
                    </div>
                </div>

            </div>

        </div>
        
    </div>
</section>
<script>
$(document).ready(function(){
var lat= $('.lat').val()
var lon= $('.lon').val()
var address= $('.address').val()
map = new GMaps({
  div: '#map',
  zoom: 14,
  lat: lat,
  lng: lon,
});
map.addMarker({
    lat: lat,
  lng: lon,
  title: address
})
})
</script>

@elseif($page->slug == 'country')
<section class="main-wrapper">
    <div class="country-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Country</h1>
                </div>
            </div>
<?php $pageblocks = DB::table('country')->orderBy('title','ASC')->get(); 
 ?>
@if($pageblocks)
            <div class="row">
                <div class="col-md-12">
                    @foreach( $pageblocks as $key=>$blocks)
                    @if($blocks->featured_image != '')
                    <div class="blocks bg-image" style="background-image:url({{ asset('/img/country/'.$blocks->featured_image)}});">
                    @else
                    <div class="blocks bg-image">
                    @endif    
                        <div class="block-content">
                            <h1><a href="{{ URL::to( 'country'.$blocks->url ) }}"><span>{{$blocks->title}}</span> <span class="right-arrow"><i class="fa fa-angle-right"></i></span></a></h1>
                            {!! $blocks->description !!}
                        </div>

                    </div>
                    @endforeach
                   
                </div>
            </div>
 @endif           
        </div>
        
    </div>
</section>
@endif
 @endforeach
 @endif
@stop