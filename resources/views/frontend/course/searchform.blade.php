@extends('frontend.master')
@section('content')
<section class="main-wrapper">
	<div class="search-page-wrapper">
		<div class="container">
			{!! Form::open( array( 'route'=> 'course.search.list','files' => true,'accept-charset'=>'UTF-8','method'=>'GET', 'class'=>'' ) ) !!}
			<div class="row">
				<div class="col-sm-5 col-md-5">
						{!! Form::text('keyword', '' ,['class' => 'form-control','placeholder' => 'Keywords'] ) !!}
				</div>
				<div class="col-sm-3 col-md-2">
						<select name="location" id="location" class="form-control" placeholder="Choose Location">
							<option value="">Location</option>
							@foreach( $locations as $key=>$location)
							<option value="{{$location->id}}">{{$location->name}}</option>
							@endforeach
						</select>
				</div>
				<div class="col-sm-4 col-md-3">
						<select name="level" id="level" class="form-control" placeholder="Choose Course Level">
							<option value="">Course Level</option>
							@foreach( $courselevel as $key=>$course)
							<option value="{{$course->id}}">{{$course->title}}</option>
							@endforeach
						</select>
				</div>
				<div class="col-sm-1 col-md-2 hidden-xs hidden-sm">
						<button class="btn btn-outline btn-block">
						search
						</button>
						<a class="more-options" href="javascript:;">More options <span class="fa fa-angle-right"></span></a>
				</div>
			</div>
			<div class="row" id="more-options-slide">
				<div class="col-md-6 col-sm-6">
					<select id="study-field" class="form-control" name="study_field">
						<option value="">Courses</option>
						@foreach( $courses as $key=>$cours)
						<option value="{{$cours->id}}">{{$cours->course_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6 col-sm-6">
					<select id="institution-type" class="form-control" name="institution_type">
						<option value="">Institution Type</option>
						@foreach( $types as $key=>$type)
						<option value="{{$type->u_id}}">{{$type->university_name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 visible-xs visible-sm">
					<button class="btn btn-outline btn-block">
					search
					</button>
					<a class="more-options" href="">More options <span class="fa fa-angle-down"></span></a>
				</div>
			</div>
			
			{!! Form::close() !!}
		</div>
		
	</div>
</section>
@stop