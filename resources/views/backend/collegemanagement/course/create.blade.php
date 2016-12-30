@extends('layouts.app')
@section('htmlheader_title')
Course Create
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
		{!! Form::open( array( 'route'=> 'admin.course.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="course-wrap">
		 <div class="firstsectionwrap">
		 <div class="sectionwrap col-md-9 col-sm-9 ">
		 	<input type="hidden" name="counter" value="0" class="counter">

			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('course','Course Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('course', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
								{!! Form::label('college','College',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="college[]" id="college" class="form-control" placeholder="Choose College" multiple>
										<!-- <option></option>  -->
										@foreach( $colleges as $key=>$college)
										<option value="{{$college->collegeid}}">{{$college->college_name}}</option>
										@endforeach
									</select>
								</div>
					</div>
					<div class="form-group">
								{!! Form::label('courselevel','Course Level',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="courselevel" id="courselevel" class="form-control" placeholder="Choose course level">
										<option></option> 
										@foreach( $courselevel as $key=>$level)
										<option value="{{$level->id}}">{{$level->title}}</option>
										@endforeach
									</select>
								</div>
					</div>
					
					<div class="form-group">
						{!! Form::label('details','Course Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('details','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('subjects','Subject List',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('subjects','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 right-sidebar">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Featured Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					<input type="file" name="upload" onchange="readURL(this,'');" accept="image/*" id="icon-upload" class="icon-upload">
					</span>
					<div class="bg-img" id="bgimg"></div>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Header Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					<input type="file" name="uploadheader" onchange="readfeatured10(this,'headimg');" accept="image/*" id="icon-uploadheader" class="icon-uploadheader">
					</span>
					<div class="headimg"></div>
				</div>
			</div>
		<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
 </div>
 </div>
				
			
		</div>
		<!-- end of main-content -->



{!! Form::close() !!}
	
			
		</div>
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addmorecourses btn btn-primary"><i class="fa fa-plus"></i> Add More Course</a>
				</div>
			</div>
		</div> -->
	</div>

	<div class="courseadd" style="display:none;">
		<div class="sectionwrap inner-wrap second">
			<input type="hidden" name="counter[]" value="" class="counter">
			<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('course','Course Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('course[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
								{!! Form::label('college','College',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="college[][]" id="college" class="form-control" placeholder="Choose College" multiple>
										<option>Choose College</option>
										@foreach( $colleges as $key=>$college)
										<option value="{{$college->collegeid}}">{{$college->college_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
					
					<div class="form-group">
						{!! Form::label('details','Course Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('details[]','',['class' => 'form-control textarea','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 right-sidebar">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Featured Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					<input type="file" name="upload[]" onchange="" accept="image/*" class="icon-upload" id="icon-upload">
					</span>
					<div class="bgimg" id="bgimg"></div>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Header Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block headerimg">
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					<input type="file" name="uploadheader[]" onchange="" accept="image/*" class="icon-uploadheader" id="icon-uploadheader">
					</span>
					<div class="headerimg" id="headerimg"></div>
				</div>
			</div>
		
			</div>
 </div>
	</div>
@stop