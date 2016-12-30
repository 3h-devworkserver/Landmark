@extends('frontend.master')

@section('content')
<section class="main-wrapper news">
    <div class="newsandevents-wrapper">
        <div class="page-style-1 bg-image" style="background-image:url({{ asset('/img/'.$testpage->featured_image)}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">TESTIMONIALS</h1>
                    </div>
                </div>
                
            </div>
        </div>
        @if($testimonials)
        <div class="container mt40">
            <?php //echo '<pre>'; print_r($testimonials);?>
            @foreach($testimonials as $key=>$testimonial)
                
                    <div class="testimonials-wrapper">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                            <div class="thumb-bg" style="background-image:url({{ asset('/img/testimonial/'.$testimonial->image)}} );"></div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="desc-wrap">
                                    <div class="user-desc">
                                        <h5 class="name">{{ $testimonial->name}}</h5>
                                        <h5 class="position">{{ $testimonial->job_title }}</h5>
                                        @if($testimonial->address)
                                        <h5 class="country">{{ $testimonial->address }}</h5>
                                        @else
                                        <h5 class="country">{{ $testimonial->company }}</h5>
                                        @endif



                                    </div>
                                    <div class="descrption">
                                         <div class="desc-txt">
                                            {!! $testimonial->content !!}
                                        </div>
                                        @if($testimonial->url)
                                        <iframe frameborder="0" allowfullscreen="" src="{{ $testimonial->url }}?autoplay=0&amp;loop=0&amp;showinfo=0&amp;theme=dark&amp;color=red&amp;controls=1&amp;modestbranding=0&amp;start=0&amp;fs=1&amp;iv_load_policy=1&amp;wmode=transparent&amp;rel=1" class="actAsDiv"></iframe>
                                        @endif
                                    </div>
                                    
                                </div>
                              
                            </div>
                        </div>        
                    </div>
                    
                
           @endforeach
           <!--  <div class="row">
                <div class="testimonials-wrapper">
                    <div class="row">
                        <div class="col-md-4">
                        <div class="thumb-bg" style="background-image:url('assets/img/testimonial~nisha.jpg');"></div>
                        </div>
                        <div class="col-md-8">
                            <div class="desc-wrap">
                                <div class="user-desc">
                                    <h5 class="name">Ms Nisha Kamboj</h5>
                                    <h5 class="position">Marketing and Communications Coordinator</h5>
                                    <h5 class="country">South Asia</h5>



                                </div>
                                <div class="descrption">
                                    <div class="desc-txt">
                                        
                                    
                                    <p>
                                        University of Wollongong (UOW) graduates have some of the best study and employment outcomes in Australia. At UOW we have a positive, hardworking culture of teaching and learning. It’s our mission to give students the opportunities they need to reach their full potential.
                                    </p>
                                    <p>
                                        I am very impressed with the team at the Landmark Education who represent UOW in Nepal. They are a resourceful link between students and the university. The counsellors have a deep and detailed knowledge of the education sector in Australia and work with great professionalism and dedication with their students.
                                    </p>
                                    <p>
                                        The task of choosing the right university up to the point of submitting an application can be quite daunting; however, the experienced team at Landmark Education provides exceptional guidance through the application stages, ensuring approval of student visa and timely arrival in Australia.
                                    </p>
                                    <p>
                                        I strongly recommend Landmark Education to students and their parents for all expert counselling needs with peace of mind.
                                    </p>
                                    </div>

                                    
                                </div>
                                
                            </div>
                          
                        </div>
                    </div>        
                </div>
                
            </div> -->
            
            <div class="row">
                <div class="col-md-12">
                    {!! $testpage->description !!}
                    <!-- <div class="testimonial-videos">
                        <iframe frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/jYXCMvz-_b4?autoplay=0&amp;loop=0&amp;showinfo=0&amp;theme=dark&amp;color=red&amp;controls=1&amp;modestbranding=0&amp;start=0&amp;fs=1&amp;iv_load_policy=1&amp;wmode=transparent&amp;rel=1" class="actAsDiv"></iframe>
                    </div>
                    <div class="testimonial-videos">
                        <iframe frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/jYXCMvz-_b4?autoplay=0&amp;loop=0&amp;showinfo=0&amp;theme=dark&amp;color=red&amp;controls=1&amp;modestbranding=0&amp;start=0&amp;fs=1&amp;iv_load_policy=1&amp;wmode=transparent&amp;rel=1" class="actAsDiv"></iframe>
                    </div> -->
                </div>
            </div>

        </div>
        @endif
    </div>
</section>

@stop