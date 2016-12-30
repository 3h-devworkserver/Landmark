<section id="second" class="thumnail-slider">
<div id="sync1" class="owl-carousel owl-theme">
@if($sliders)
@foreach($sliders as $slider)
    <div class="item slide bg-image" style="background-image:url({{ asset('/img/slider/'.$slider->image)}}"></div>
@endforeach
@endif    
    <!-- <div class="item slide bg-image" style="background-image:url('assets/img/frontpage~2~usa.jpg');"></div>
    <div class="item slide bg-image" style="background-image:url('assets/img/slide.jpg');"></div>
     -->

</div>
    <a href="#third" class="down-arrow">
        <i class="fa fa-angle-down"></i>
    </a>
<div class="container intro_cont">
    <div class="row">
        <div class="col-md-12">
            <div id="sync2" class="owl-carousel owl-theme">
            @if($sliders)
            @foreach($sliders as $slider)

                <div class="item">
                    <div class="row-fluid box">
                    <div class="serv-icon animate col-sm-4 col-xs-4"> 
                        <img src="{{ asset('/img/slider/icon/'.$slider->iconimage) }}" class="et-waypoint et_pb_animation_bottom  et-animated"> 
                    </div>
                    <div class="col-sm-8 col-xs-8">
                        <div class="service_text">
                            {{ $slider->caption }}
                        </div>
                       <a href="#" class="btn btn-outline">
                        Get more details
                      </a>
                      
                    </div>
                </div>
                </div>

                @endforeach
                @endif
              

            </div>
            
        </div>
    </div>
</div>



</section>