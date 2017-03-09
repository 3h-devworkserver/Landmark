@extends('layouts.app')
@section('htmlheader_title')
Course Tab Create
@endsection
@section('main-content')
<div class="spark-screen add-page">
	<div class="row">
		<div class="col-md-12">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> 'admin.coursetab.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="coursetab-wrap">
			<div class="firstsectionwrap ">
				<div class="sectionwrap col-md-9 col-sm-9">
					<input type="hidden" name="counter[]" value="0" class="counter">
					<div class="box">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('content[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="box">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('college','College',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="college" id="college" class="form-control" placeholder="Choose College">
										<option value="">Choose College</option>
										@foreach( $colleges as $key=>$college)
										<option value="{{$college->collegeid}}">{{$college->college_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('course','Course',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="course" id="course" class="form-control" placeholder="Choose College">
										<option value="">Choose Course</option>
										@foreach( $courses as $key=>$course)
										<option value="{{$course->id}}">{{$course->course_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="text-right">
						{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
		
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="addmore">
				<a href="javascript:;" class="addmorecoursetab btn btn-primary"><i class="fa fa-plus"></i> Add More Course Tab</a>
			</div>
		</div>
	</div>
</div>
<div class="coursetabadd" style="display:none;">
	<div class="sectionwrap inner-wrap second">
		<input type="hidden" name="counter[]" value="" class="counter">
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content[]','',['class' => 'form-control textarea','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop