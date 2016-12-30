@extends('layouts.app')
@section('htmlheader_title')
Country Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.country.block.update',$countriesblock->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12">
		
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($countriesblock) ? $countriesblock->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('identifier','Identifier',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('identifier', isset($countriesblock) ? $countriesblock->identifier :  '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
						<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="countries" class="form-control">
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}" <?php if( $country->id == $countriesblock->cid ){ echo 'selected'; } ?> >{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					

					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($countriesblock) ? $countriesblock->content : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
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
						@if($countriesblock->featured_image != '')
						<div class="bg-img featured-img" style="background-image:url('{{ asset('/img/country/static/'. $countriesblock->featured_image) }}');">
							
						</div>
						@else
						<div class="bg-img <?php if($countriesblock->featured_image != '') { echo 'featured-img'; } ?>"></div>
						@endif
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured(this);" class="form-control" name="file" id="fileimg" />
						</span>
					
					
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Url
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::text('url', isset($countriesblock) ? $countriesblock->url : '' ,['class' => 'form-control'] ) !!}
				</div>
			</div>

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Choose Background Option
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::select('backgroundoption', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),$countriesblock->boption ,['class' => 'form-control','id' => 'Option'] ) !!}
					<div class="wrap-background-img" style="<?php if($countriesblock->boption == 'img') { echo 'display:block';} else { echo 'display:none';} ?>">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Change Image{!! Form::file('bfile','',['class' => 'form-control'] ) !!}
					</span>
						
						@if( $countriesblock->bimg != '' )

						<img src="{{ asset('/img/country/static'. $countriesblock->bimg) }}" height="200" width="200">
						@endif
						</div>
						</div>
					</div>
					<div class="wrap-background-color" style="<?php if($countriesblock->boption == 'color') { echo 'display:block';} else { echo 'display:none';} ?>">
						<div id="pcolor" class="form-group colorpicker-component">
						{!! Form::label('bcolor','Background Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8 input-group colorpicker-component colorpicker-element">
						{!! Form::text('bcolor',$countriesblock->bcolor,['class' => 'form-control color'] ) !!}
						<span class="input-group-addon"></span>
						</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		<!-- end of main-content -->


{!! Form::close() !!}
	
			
		</div>
	</div>
@stop