@extends('layouts.app')
@section('htmlheader_title')
Country Create
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
		{!! Form::open( array( 'route'=> 'admin.country.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12 country-wrap inner-wrap">
		 <div class="firstsectionwrap">
		 <div class="sectionwrap">
		 	<input type="hidden" name="counter[]" value="0" class="counter">

			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
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
					<div class="form-group">
						{!! Form::label('innercontent','Inner Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('innercontent[]','',['class' => 'form-control','id' => 'innerpagedesc'] ) !!}
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
					<input type="file" name="uploadheader[]" onchange="readfeatured10(this,'headimg');" accept="image/*" id="icon-uploadheader" class="icon-uploadheader">
					</span>
					<div class="headimg"></div>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Url
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::text('url[]', '' ,['class' => 'form-control'] ) !!}
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
					<a href="javascript:;" class="addmorecountry btn btn-primary"><i class="fa fa-plus"></i> Add New Country</a>
				</div>
			</div>
		</div>
	</div>

	<div class="countryadd" style="display:none;">
		<div class="sectionwrap inner-wrap second">
			<input type="hidden" name="counter[]" value="" class="counter">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
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
					<div class="form-group">
						{!! Form::label('innercontent','Inner Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('innercontent[]','',['class' => 'form-control innertextarea','id' => 'innerpagedesc'] ) !!}
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
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Url
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::text('url[]', '' ,['class' => 'form-control'] ) !!}
				</div>
			</div>
 </div>
	</div>
@stop