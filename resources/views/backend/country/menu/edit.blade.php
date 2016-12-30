@extends('layouts.app')
@section('htmlheader_title')
Country Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.country.menu.update',$countriesmenus->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12">
			<div class="box">
				<div class="box-body">
						<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="country" class="form-control">
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}" <?php if( $country->id == $countriesmenus->country_id ){ echo 'selected'; } ?> >{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($countriesmenus) ? $countriesmenus->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('subtitle','Sub Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('subtitle', isset($countriesmenus) ? $countriesmenus->sub_title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<!-- <div class="form-group">
						{!! Form::label('url','Link',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('url', isset($countriesmenus) ? $countriesmenus->url : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div> -->
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($countriesmenus) ? $countriesmenus->content : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Change Featured Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
						@if($countriesmenus->featured_image != '')
						<div class="bg-img featured-img" style="background-image:url('{{ asset('/img/country/'. $countriesmenus->featured_image) }}');">
							
						</div>
						@else
						<div class="bg-img <?php if($countriesmenus->featured_image != ''){ echo  'featured-img';}?>"></div>
						@endif
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured(this);" class="form-control" name="upload" id="fileimg" />
						</span>
					
					
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Change Header Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
						@if($countriesmenus->header_image != '')
						<div class="bg-img header-img headerimg" style="background-image:url('{{ asset('/img/country/'. $countriesmenus->header_image) }}');">
							
						</div>
						@else
						<div class="<?php if($countriesmenus->header_image != ''){ echo  'header-img';}?> headerimg"></div>
						@endif
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured10(this,'headerimg');" class="form-control" name="uploadheader" id="fileimg" />
						</span>
					
					
				</div>
			</div>		
			<div class="">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
	</div>
		<!-- end of main-content -->

{!! Form::close() !!}
	
			
		</div>
	</div>
@stop