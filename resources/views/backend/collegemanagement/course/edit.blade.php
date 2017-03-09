@extends('layouts.app')
@section('htmlheader_title')
Country Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.course.update',$course->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('course','Course Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('course', isset($course) ? $course->course_name : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
								{!! Form::label('college','College',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<?php 
									$ids = explode(',', $course->college_id);
									?>
									<select name="college[]" id="college" class="form-control" placeholder="Choose College" multiple>
										@foreach( $colleges as $key=>$college)
										<option value="{{$college->collegeid}}" <?php foreach($ids as $id ){ if( $college->collegeid == $id ){ echo 'selected'; } } ?> >{{$college->college_name}}</option>
										@endforeach
									</select>
								</div>
					</div>
					<div class="form-group">
								{!! Form::label('courselevel','Course Level',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="courselevel" id="courselevel" class="form-control" placeholder="Choose course level">
										<option value=""></option>
										@foreach( $courselevel as $key=>$level)
										<option value="{{$level->id}}" <?php if( $level->id == $course->level_id ){ echo 'selected'; }  ?> >{{$level->title}}</option>
										@endforeach
									</select>
								</div>
					</div>
					<div class="form-group">
						{!! Form::label('details','Course details',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('details',isset($course) ? $course->course_detail : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('subjects','Subject Lists',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('subjects',isset($course) ? $course->subjects : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of main-content -->

		<!-- start of sidebar -->
		 <div class="col-md-3 col-sm-3 right-sidebar">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('ielts','IELTS Score',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('ielts', isset($course) ? $course->ielts : '' ,['class' => 'form-control', 'placeholder'=>'5'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('scholarship','Scholarship',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('scholarship',isset($course) ? $course->scholarship : '',['class' => 'form-control', 'placeholder'=>'10%'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('tuition-fee','Tuition Fee',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('fee',isset($course) ? $course->tuitionfee : '',['class' => 'form-control', 'placeholder'=>'$450'] ) !!}
						</div>
					</div>
					
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?php if($course->images != ''){ echo  'Change';}else{ echo 'Upload';}?> Featured Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
			
				 <div class="box-body upload-block">
					 	@if($course->images != '')
									<div class="bg-img featured-img" style="background-image:url('{{ asset('img/course/'.$course->images) }}');">
										
									</div>
									@else
									<div class="bg-img <?php if($course->images != ''){ echo  'featured-img';}?>"></div>
									@endif
									<p class="help-block">Max image size:1000x1000, less than 2MB</p>
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i><?php if($course->images != ''){ echo  'Change';}else{ echo 'Upload';}?> Image
									<input type='file' onchange="readfeatured10(this,'bg-img');" class="form-control featured-img" name="upload" id="fileimg" />
									</span>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?php if($course->header_image != ''){ echo  'Change';}else{ echo 'Upload';}?> Header Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
						@if($course->header_image != '')
						<div class="header-img headerimg" style="background-image:url('{{ asset('/img/course/'. $course->header_image) }}');">
							
						</div>
						@else
						<div class="<?php if($course->header_image != ''){ echo  'header-img';}?> headerimg"></div>
						@endif
						<p class="help-block">Max image size:1300x1000, less than 2MB</p>
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i><?php if($course->header_image != ''){ echo  'Change';}else{ echo 'Upload';}?> Image
						<input type='file' onchange="readfeatured10(this,'headerimg');" class="form-control" name="uploadheader" id="fileimg" />
						</span>
					
					
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