@extends('layouts.app')
@section('htmlheader_title')
Country's University Create
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
		{!! Form::open( array( 'route'=> 'admin.country.universities.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12 countryuniversity-wrap inner-wrap">
		 <div class="firstsectionwrap">
		 <div class="sectionwrap">
		 	<input type="hidden" name="counter[]" value="0" class="counter">

			<div class="box">
				<div class="box-body">
					
					<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="country" class="form-control">
								<option></option>
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}">{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>
				
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
					<input type="file" name="upload[]" onchange="readURL(this,'');" accept="image/*" id="icon-upload" class="icon-upload">
					</span>
					<div class="bg-img" id="bgimg"></div>
				</div>
			</div>
 </div>
 </div>
				
			<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		<!-- end of main-content -->

		<!-- start of sidebar -->
		<!-- <div class="col-md-3 col-sm-3 right-sidebar">
		
		
		
		</div> -->

{!! Form::close() !!}
	
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addcountryuniversity btn btn-primary"><i class="fa fa-plus"></i> Add New University</a>
				</div>
			</div>
		</div>
	</div>

	<div class="countryuniversityadd" style="display:none;">
		<div class="sectionwrap inner-wrap second">
			<input type="hidden" name="counter[]" value="" class="counter">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>
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
 </div>
	</div>
@stop