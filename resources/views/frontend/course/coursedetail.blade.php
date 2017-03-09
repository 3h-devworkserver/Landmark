@extends('frontend.master')
@section('content')
<section class="main-wrapper">

	<div class="course-detail">
        @if(!empty($courses->header_image))
        <div class="page-style-1 bg-image" style="background-image:url({{ asset( '/img/course/'.$courses->header_image ) }});">
		@else
        <div class="page-style-1" style="background-color:#0066B1;">
        @endif    
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-title">Course Detail</h1>
                    </div>
                </div>
                
            </div>
        </div>
		
		<div class="container mt40">
			<div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{URL::to( '/course/searchform' )}}">Course</a></li>
                            <li class="active">{{ $courses->course_name }}</li>
                        </ol>
                    </div>
                </div>
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="course-detail-wrap">
						<h3 class="news-heading">
								{{ $courses->course_name }}
						</h3>
					</div>
					<hr>
					<div class="row">
                        <div class="col-md-3">

                            
                            @if(!empty($courses->images))
                            <div class="bg-image" style="background-image:url({{ asset( '/img/course/'.$courses->images ) }});">
                                <!-- <img class="logo" src="{{ asset( '/img/course/'.$courses->images ) }}" alt="{{ $courses->course_name }}"> -->
                             </div>
                            
                            @else
                             <div class="bg-image" style="background-image:url({{ asset( '/img/noimages.jpg/') }});">
                                 
                             </div>
                           
                            @endif
                          </div>
                        <div class="col-md-9 description">
                            @if(!empty($courses->level_id))
                                <?php $level = DB::table('course_level')->where('id',$courses->level_id)->first();?>
                                <div class="level"><i class="fa fa-tag"></i>{{ $level->title }}</div>
                                @endif
                            {!! $courses->course_detail !!}                    
                        </div>
                        
                        
                    </div>
                    <hr>
                      <div class="row">
                        <div class="col-md-12">
                            <h3>List of Colleges</h3>
                            <?php $clzid = explode(',', $courses->college_id); ?>
                            <ul class="subject-list list-unstyled">
                                    @foreach( $clzid as $key => $cid)
                                    <?php $clzname = DB::table('college_details')->where('collegeid',$cid)->first();?>
                                    <li><a href="{{ URL::to('/college-australia/'.$clzname->slug)}}" alt="">{{ $clzname->college_name }}</a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <hr>
                        <h3>Course Information</h3>
                        <ul class="subject-list list-unstyled">
                        <li><p><b>IELTS: </b>{{ $courses->ielts }}</p></li>
                        <li><p><b>Scholarship:</b> {{ $courses->scholarship }}</p></li>
                        <li><p><b>Tuition Fee: </b>{{ $courses->tuitionfee }}</p></li>
                    </ul>
                    </div>
                
                    @if(!empty($courses->subject))
                    <div class="row">
                    	<div class="col-md-12">
                    		<h3>Subjects</h3>
                            {!! $courses->subjects !!}
                    	</div>
                    </div>
                    @endif
                    <?php 
                     $coursetabs = DB::table('course_tabs')->where('course_id',$courses->id)->get();
                    ?>    
                    @if(count($coursetabs) > 0 )
                    <div class="row mt40">
                    	<div class="col-md-12">
                    		<div class="margin-25">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach( $coursetabs as $key => $ctab )
                            <li role="presentation" class="<?php if($key == 0){ echo 'active';}?>">
                                <a href="#{{ $ctab->slug }}" aria-controls="{{ $ctab->slug }}" role="tab" data-toggle="tab" aria-expanded="<?php if($key == 0){ echo 'true';} else { echo 'false'; }?>">{{ $ctab->title }}</a></li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach( $coursetabs as $key => $ctab )
                            <div role="tabpanel" class="tab-pane <?php if($key == 0){ echo 'active';}?>" id="{{$ctab->slug}}">
                            {!! $ctab->content!!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    	</div>
                    </div>
                    @endif
				</div>
                <?php
                 $courselist = DB::table('course_details')->where('id','!=',$courses->id)->get();
                ?>
                @if(count($courselist) > 0 )
				<div class="col-md-4 col-sm-4">
					<div class="sidebar-wrapper">
                            
                            <aside>
                                <h2 class="sidebar-title">Related Course</h2>
                                @foreach( $courselist as $key => $list )
                                <div class="media">
                                    @if(!empty($list->images))
                                    
                                    <div class="media-left bg-image" style="background-image:url({{ asset( '/img/course/'.$list->images ) }});">
                                       <!--  <div class="image-wrap">
                                            <img src="{{ asset( '/img/course/'.$list->images ) }}" alt="">
                                        </div>-->
                                    </div>
                                    @else
                                    <div class="media-left bg-image" style="background-image:url({{ asset( '/img/noimages.jpg/' ) }});">
                            
                                    </div>
                                    @endif
                                    <div class="media-body">
                                        <a href="{{URL::to('/course-australia/'.$list->slug)}}">
                                            <h4 class="media-heading">
                                                {{$list->course_name}}</h4>
                                        </a>
                                    </div>
                                </div>
                             @endforeach
                               <!--  <div class="more-button">
                                    <a href="#" class="btn btn-readmore" role="button">
                                        <i class="fa fa-angle-right"></i>More</a>
                                </div> -->
                            </aside>
                        </div>
				</div>
				@endif
			</div>
		</div>
	</div>
</section>			
@stop