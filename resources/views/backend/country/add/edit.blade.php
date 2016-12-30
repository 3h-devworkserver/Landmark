@extends('layouts.app')
@section('htmlheader_title')
Country Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.country.update',$countries->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($countries) ? $countries->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($countries) ? $countries->description : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('innercontent','Inner Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('innercontent',isset($countries) ? $countries->inner_description :'',['class' => 'form-control','id' => 'innerpagedesc'] ) !!}
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
					 	@if($countries->featured_image != '')
									<div class="bg-img featured-img" style="background-image:url('{{ asset('img/country/'.$countries->featured_image) }}');">
										
									</div>
									@else
									<div class="bg-img featured-img"></div>
									@endif
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Change Image
									<input type='file' onchange="readfeatured10(this,'featured-img');" class="form-control featured-img" name="upload" id="fileimg" />
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
						@if($countries->header_image != '')
						<div class="bg-img header-img headerimg" style="background-image:url('{{ asset('/img/country/'. $countries->header_image) }}');">
							
						</div>
						@else
						<div class="<?php if($countries->header_image != ''){ echo  'header-img';}?> headerimg"></div>
						@endif
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured10(this,'headerimg');" class="form-control" name="uploadheader" id="fileimg" />
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
					{!! Form::text('url', isset($countries) ? $countries->url : '' ,['class' => 'form-control'] ) !!}
				</div>
			</div>

				
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		<!-- end of main-content -->

		<!-- start of sidebar -->
		<!-- <div class="col-md-3 col-sm-3 right-sidebar">
		
		
		
		</div> -->

{!! Form::close() !!}
	
			
		</div>
	</div>
@stop