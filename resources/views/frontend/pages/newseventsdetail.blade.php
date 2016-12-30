@extends('frontend.master')
@section('content')
<?php //echo '<pre>'.'Test'; print_r($eimage); die();?>
<section class="main-wrapper news">
    <div class="newsandevents-wrapper news-detail">
        <div class="page-style-1 bg-image" style="background-image:url({{asset('/img/newsandevents/'.$news->header_img)}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">news &amp; events</h1>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container mt40">
        <div class="row-fluid">
                <div class="thumbnail detail-wrapper"> 
                    <div class="backbtn"><a href="{{URL::to('news-and-events')}}" class="btn btn-readmore"><i class="fa fa-angle-left"></i></a></div>
            <div class="col-md-4 col-sm-4 pl0 detail-sidebar">
                
            {!! $news->sidebar_content !!} 
            </div>
            <div class="col-md-8 col-sm-8 pr0">
            {!! $news->content !!}

               @if($eimage)
               <div class="detail-img">
                @foreach($eimage as $img)
                <div class="imgwrap">
                    <img src="{{ asset('/img/newsandevents/'.$img->images) }}" alt="">
                </div>
                @endforeach
                </div>
                @endif 
            </div>
      
        </div>
        </div>
        </div>
    </div>
</section>
@stop