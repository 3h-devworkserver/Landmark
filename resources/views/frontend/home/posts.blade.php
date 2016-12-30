@extends('frontend.master')
@section('content')

@if( $slug == $pageslug)
<section class="main-wrapper">
            <div class="university-wrapper">
                    <div class="container">
                            <div class="row">
                                    <div class="col-md-12">
                                        @if($pageslug == 'universities')
                                            <h1 class="page-title">{{$slug}} of australia</h1>
                                        @else
                                            <h1 class="page-title">{{$slug}}</h1>
                                        @endif
                                    </div>
                            </div>
                        @if($posts)
                             <div class="row">
                               @foreach($posts as $post)

                                        @if($post->category == 1)
                                        <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail">
                                                        <div class="thumb-img bg-image" style="background-image:url( {{ asset('/img/post/'.$post->image) }});">
                                                        </div>
                                                        <div class="caption">
                                                                @if($post->content != strip_tags($post->content))
                                                                   {!! $post->content !!}
                                                                   @else
                                                                   <p>{{ $post->content }}</p>
                                                                   @endif
                                                                <p>
                                                                        <a href="{{ $post->url }}" target="_blank" class="btn btn-readmore" role="button" target="_blank"><i class="fa fa-angle-right"></i>visit website</a>
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                        @else
                                          <div class="col-md-6 col-sm-6">
                                            <a href="{{ $post->url }}" class="preparation-class" target="_blank">
                                                <span class="logo-class bg-image" style="background-image:url( {{ asset('/img/post/'.$post->image) }});"></span>
                                                <span class="right-arrow"><i class="fa fa-angle-right"></i></span>
                                            </a>
                                        </div>
                                        @endif
                               @endforeach       
                                </div>
                        @endif
                        </div>
                        
                </div>
        </section>

       
@endif
    


@stop