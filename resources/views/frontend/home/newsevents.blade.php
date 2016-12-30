@extends('frontend.master')

@section('content')
<section class="main-wrapper news">
    <div class="newsandevents-wrapper">
        <div class="page-style-1 bg-image" style="background-image:url('{{ asset('/img/'. $image->featured_image) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">news &amp; events</h1>
                    </div>
                </div>
                
            </div>
        </div>
        @if($news)
        <div class="container mt40">
            <div class="row">
                @foreach($news as $new)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="{{URL::to('/news-events/'.$new->slug)}}">
                        <div class="thumb-img bg-image" style="background-image:url({{ asset('/img/newsandevents/'. $new->image) }});">
                        </div>
                    </a>
                        <div class="date">
                            <?php $date=date_create($new->e_date); ?>
                            {{ date_format($date,"j F, Y") }}
                            </div>
                        <div class="caption">
                           <a href="{{URL::to('/news-events/'.$new->slug)}}"> <h3 class="news-heading">{{ $new->title }}</h3></a>
                            {!! $new->summary !!}
                           <?php $title = str_replace(' ', '-', $new->title)?>
                            <div class="caption-footer">
                                <a href="{{URL::to('/news-events/'.$new->slug)}}" data-title="{{ $title }}" data-id="{{$new->id}}" class="btn btn-readmore pull-left" id="newsdetails" role="button"><i class="fa fa-angle-right"></i>
                                </a>
                               <!--  <ul class="list-unstyled list-inline social-links pull-right">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    
                                </ul> -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
           
            </div>

            <a href="#home" class="up-arrow">
                    <i class="fa fa-angle-up"></i>
                </a>

        </div>
        @endif
    </div>
</section>

@stop