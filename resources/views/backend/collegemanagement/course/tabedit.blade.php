@extends('layouts.app')
@section('htmlheader_title')
Course Tab Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.coursetab.update',$coursetab->college_id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
				
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($coursetab) ? $coursetab->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($coursetab) ? $coursetab->content : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-3">
				<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','College',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="college" id="college" class="form-control" placeholder="Choose University">
								<option>Choose College</option>
								@foreach( $colleges as $key=>$college)
								<option value="{{$college->collegeid}}" <?php if( $college->collegeid == $coursetab->college_id ){ echo 'selected'; } ?> >{{ $college->college_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
								{!! Form::label('course','Course',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="course" id="course" class="form-control" placeholder="Choose College">
										<option>Choose College</option>
										@foreach( $courses as $key=>$course)
										<option value="{{$course->id}}" <?php if( $course->id == $coursetab->course_id ){ echo 'selected'; } ?> >{{$course->course_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							</div>
							</div>
					<div class="text-right">
						{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
					</div>
				</div>
		{!! Form::close() !!}
		</div>
	</div>
@stop