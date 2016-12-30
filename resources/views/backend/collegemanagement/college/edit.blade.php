@extends('layouts.app')
@section('htmlheader_title')
College Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.college.update',$colleges->collegeid),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Institution Type',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="university" id="university" class="form-control" placeholder="Choose University">
								<option>Choose Institution Type</option>
								@foreach( $universities as $key=>$university)
								<option value="{{$university->u_id}}" <?php if( $university->u_id == $colleges->uni_id ){ echo 'selected'; } ?>>{{$university->university_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('title','College Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($colleges) ? $colleges->college_name : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($colleges) ? $colleges->college_detail : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('contact','Contact Number',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('contact',isset($colleges) ? $colleges->contact :'',['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
								{!! Form::label('location','Location',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="location[]" id="location" class="form-control" placeholder="Choose Location">
										<option>Choose Location</option>
										@foreach( $locations as $key=>$location)
										<option value="{{$location->id}}" <?php if($colleges->location == $location->id ){ echo 'selected'; }?>>{{$location->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
				</div>
			</div>
			
				</div>
				<div class="col-md-3 col-sm-3">	
							<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">
							Select Slider
							</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
								</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body upload-block">
									<select name="slider" id="slider" class="form-control" placeholder="Choose Slider">
										<option value="">Choose Slider</option>
										@foreach( $sliders as $key=>$slider)
										<option value="{{$slider->id}}" <?php if( $slider->id == $colleges->slider_id ){ echo 'selected'; } ?>>{{$slider->title}}</option>
										@endforeach
									</select>
								</div>
							</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?php if($colleges->images != ''){ echo  'Change';}else{ echo 'Upload';}?> Featured Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
			
				 <div class="box-body upload-block">
					 	@if($colleges->images != '')
									<div class="bg-img featured-img" style="background-image:url('{{ asset('img/college/'.$colleges->images ) }}');">
										
									</div>
									@else
									<div class="bg-img <?php if($colleges->images != ''){ echo  'featured-img';}?>"></div>
									@endif
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i><?php if($colleges->images != ''){ echo  'Change';}else{ echo 'Upload';}?> Image
									<input type='file' onchange="readfeatured10(this,'bg-img');" class="form-control" name="upload" id="fileimg" />
									</span>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?php if($colleges->header_image != ''){ echo  'Change';}else{ echo 'Upload';}?> Header Image
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
						@if($colleges->header_image != '')
						<div class="bg-img header-img headerimg" style="background-image:url('{{ asset('/img/college/'. $colleges->header_image) }}');">
							
						</div>
						@else
						<div class="<?php if($colleges->header_image != ''){ echo  'header-img';}?> headerimg"></div>
						@endif
						<span class="btn btn-default btn-file">
						<i class="fa fa-folder-open"></i><?php if($colleges->header_image != ''){ echo  'Change';}else{ echo 'Upload';}?> Image
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
					{!! Form::text('url', isset($colleges) ? $colleges->url : '' ,['class' => 'form-control'] ) !!}
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