@extends('frontend.master')
@section('content')
<section class="main-wrapper">
	<div class="search-page-wrapper">
		<div class="container">
			
			{!! Form::open( array( 'route'=> 'course.search.list','files' => true,'accept-charset'=>'UTF-8','method'=>'GET', 'class'=>'' ) ) !!}
			<div class="row">
				<div class="col-sm-3 col-md-3">
						{!! Form::text('keyword', isset($_GET['keyword']) ? $_GET['keyword'] : '' ,['class' => 'form-control','placeholder' => 'Keywords'] ) !!}
				</div>
				<div class="col-sm-2 col-md-2">
						<select name="location" id="location" class="form-control" placeholder="Choose Location">
							<option value="">Location</option>
							@foreach( $locations as $key=>$location)
							<option value="{{$location->id}}" <?php if($location->id == $_GET['location']){ echo 'selected';}?> >{{$location->name}}</option>
							@endforeach
						</select>
				</div>
				<div class="col-sm-2 col-md-2">
						<select name="level" id="level" class="form-control" placeholder="Choose Course Level">
							<option value="">Course Level</option>
							@foreach( $courselevel as $key=>$course)
							<option value="{{$course->id}}" <?php if($course->id == $_GET['level']){ echo 'selected';}?> >{{$course->title}}</option>
							@endforeach
						</select>
				</div>
					<div class="col-md-2 col-sm-2">
					<select id="study-field" class="form-control" name="study_field">
						<option value="">Courses</option>
						@foreach( $courses as $key=>$cours)
						<option value="{{$cours->id}}" <?php if($cours->id == $_GET['study_field']){ echo 'selected';}?> >{{$cours->course_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-2 col-sm-2">
					<select id="institution-type" class="form-control" name="institution_type">
						<option value="">Institution Type</option>
						@foreach( $types as $key=>$type)
						<option value="{{$type->u_id}}" <?php if($type->u_id == $_GET['institution_type']){ echo 'selected';}?> >{{$type->university_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-1 col-sm-1">
					<div class="form-group">
						<button class="btn btn-outline">
						search
						</button>
					</div>
				</div>
			</div>
		
			
			{!! Form::close() !!}

			
		</div>
	</div>
	<div class="search-list-wrap">
		<div class="container">
		@if( count($result) > 0 )
			<div class="row">
					<div class="col-md-12 info-wrap">
									<p>There are <b><?php echo count($result);?> university courses</b> related to search.</p>
					</div>
			</div>
				@foreach( $result as $r)
				<div class="row">
					<div class="search-items">
						<div class="col-md-2 col-sm-2">
							<div class="image-wrap">
							@if($r->cimages)
							<img class="course-img" src="{{ asset('img/college/'.$r->cimages ) }}" alt="">
							@else
							<img class="course-img" src="{{ asset('img/noimages.jpg' ) }}" alt="">
							@endif
							</div>
						</div>
						<div class="col-md-10 col-sm-10">
							<div class="row row-padding-10">
		                            <div class="col-md-12">
		                               <div class="course-detail-wrap">
			                               	<h3 class="news-heading">
			                                    <!-- <a href="#"> -->
			                                    <a href="{{URL::to('/course-australia/'.$r->slug)}}">
			                                        {{ $r->course_name}}
			                                    </a>
			                                </h3>
			                                <p>
			                                    <!-- <a href="#"> -->
			                                    <a href="{{URL::to('/college-australia/'.$r->college_slug)}}">
			                                        <b>{{ $r->college_name }}</b>
			                                    </a>
			                                </p>
		                            	</div>
		                            </div>
		                            <div class="col-md-5">
		                                    <p>Type of Institution: 
		                                    <b>{{ $r->university_name }}</b>
		                                </p>
		                            </div>
		                            <div class="col-md-5">
		                                <p>Level: <b>{{ $r->title }}</b></p>
		                                    <p>Location(s): 
		                                    <b>{{ $r->name }} </b>
		                                </p>
		                            </div>
		                            <div class="col-md-2">
										<a class="btn btn-outline btn-block" href="javascript:;">
		                                    Enquire now
		                                    <!-- <span class="fa fa-angle-right" aria-hidden="true"></span> -->
		                                </a>
		                          
		                            </div>
		                        </div>
						</div>
					</div>
				</div>
				@endforeach
				{!! $result->appends(['keyword'=>$_GET['keyword'],'location' => $_GET['location'],'level' => $_GET['level'],'study_field'=>$_GET['study_field'],'institution_type' =>$_GET['institution_type'] ])->render() !!}
				@else
				<div class="row no-list">
					<div class="col-md-12">
						There are no university courses related to search.
					</div>
				</div>
				@endif

		</div>
	</div>
</section>			
@stop