@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<div class="spark-screen edit-page">
<div class="row">
				
		
					@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{!! Form::open( array( 'route'=> array('static.update',$pages->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', (isset($pages))  ? $pages->static_title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('subtitle','Sub Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('subtitle', (isset($pages))  ? $pages->sub_title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('url','Url',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
						{!! Form::text('url', (isset($pages))  ? $pages->url : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					
					<div class="form-group">
						{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('description',(isset($pages))  ? $pages->description : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
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
					{!! Form::select('backgroundoption', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),$pages->boption ,['class' => 'form-control','id' => 'Option'] ) !!}
					<div class="wrap-background-img" style="<?php if($pages->boption == 'img') { echo 'display:block';} else { echo 'display:none';} ?>">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-primary btn-file btn-sm">
					<i class="fa fa-folder-open"></i>Change Image{!! Form::file('bfile','',['class' => 'form-control'] ) !!}
					</span>
						
						@if($pages->background_image != '')

						<img src="{{ asset('/img/'. $pages->background_image) }}" height="200" width="200">
						@endif
						</div>
						</div>
					</div>
					<div class="wrap-background-color" style="<?php if($pages->boption == 'color') { echo 'display:block';} else { echo 'display:none';} ?>">
						<div id="pcolor" class="form-group colorpicker-component">
						{!! Form::label('bcolor','Background Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8 input-group colorpicker-component colorpicker-element">
						{!! Form::text('bcolor',$pages->background_color,['class' => 'form-control color'] ) !!}
						<span class="input-group-addon"></span>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of main-content -->

<!-- start of sidebar -->
		<div class="col-md-3 col-sm-3 right-sidebar">

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Select Page
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					<select name="pageid" class="form-control">
							<option value="">Select Page</option>
				    @foreach($mainpages as $type =>$mainpage)

				        <option value="{{ $mainpage->id }}" <?php if($mainpage->id == $pages->page_id ) { echo 'selected'; } ?> >{{ $mainpage->title }}</option>
				       
				    @endforeach 
					</select>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Featured Image
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
						@if($pages->featured_image != '')
						<div class="bg-img featured-img" style="background-image:url('{{ asset('/img/'. $pages->featured_image) }}');">
							
						</div>
						@else
						<div class="bg-img featured-img"></div>
						@endif
						<span class="btn btn-primary btn-file btn-sm">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured(this);" class="form-control" name="file" id="fileimg" />
						</span>
						@if($pages->featured_image != '')
							<a href="javascript:;" class="btn btn-danger btn-sm" data-table="static_pages" data-url="{{ $_SERVER['REQUEST_URI'] }}" data-id="{{ $pages->id }}" id="delete"><i class="fa fa-trash"></i>Delete</a>
						
						@endif
					
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Position
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::select('position', array(''=>'Select Option','top'=>'Top','bottom'=>'Bottom'),$pages->position ,['class' => 'form-control'] ) !!}
				</div>
			</div>

			

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Choose Parallax Background Option
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
				{!! Form::select('parallax', array(''=>'Select Option','parallax'=>'Parallax','no-parallax'=>'No Parallax'),$pages->parallax ,['class' => 'form-control','id' => 'parallax'] ) !!}
				</div>
			</div>

		<!-- 	<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Order
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div>
				</div>
				<div class="box-body upload-block">
					{!! Form::text('order',$pages->ordering,['class' => 'form-control','id' => 'order'] ) !!}
				</div>
			</div> -->
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
	
{!! Form::close() !!}



		</div>
	</div>

@endsection