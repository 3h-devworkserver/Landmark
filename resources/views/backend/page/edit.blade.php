@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen edit-page">
	<div class="row">
		
		
		<!-- <div class="panel-heading">Edit Page</div> -->
		{!! Form::open( array( 'route'=> array('page.update',$pages->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', (isset($pages))  ? $pages->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('description',(isset($pages))  ? $pages->description : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
			
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">SEO Options</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('meta_title','Meta Title',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
								<div class="col-sm-9 col-md-9">
									{!! Form::text('meta_title',(isset($pages))  ? $pages->meta_title : '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('meta_key','Meta Keyword',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
								<div class="col-sm-9 col-md-9">
									{!! Form::text('meta_key',(isset($pages))  ? $pages->meta_keyword : '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('meta_desc','Meta Description',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
								<div class="col-sm-9 col-md-9">
									{!! Form::text('meta_desc',(isset($pages))  ? $pages->meta_description : '' ,['class' => 'form-control'] ) !!}
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
							<h3 class="box-title">
							Upload Featured Image
							<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
							</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-angle-up"></i></button>
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
										<a href="javascript:;" class="btn btn-danger btn-sm" data-table="pages" data-url="{{ $_SERVER['REQUEST_URI'] }}" data-id="{{ $pages->id }}" id="delete"><i class="fa fa-trash"></i>Delete</a>
									
									@endif
								</div>
							</div>
							
							
							<div class="box box-default">
								<div class="box-header with-border">
									<h3 class="box-title">
									Status
									<!-- {!! Form::label('status','Status',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
										</div><!-- /.box-tools -->
										</div><!-- /.box-header -->
										<div class="box-body">
											{!! Form::select('status',array('draft'=>'Draft','publish'=>'Publish'),$pages->status, ['class' => 'form-control'] ) !!}
										</div>
							</div>
							<div class="box box-default">
								<div class="box-header with-border">
									<h3 class="box-title">
									Type
									<!-- {!! Form::label('status','Status',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
										</div><!-- /.box-tools -->
										</div><!-- /.box-header -->
										<div class="box-body">
											{!! Form::select('type',array(''=>'Select Type','posts'=>'Post','news'=>'News & Events','testimonial'=>'Testimonial'),$pages->type, ['class' => 'form-control'] ) !!}
										</div>
							</div>
									
									
									<div class="box box-default">
										<div class="box-header with-border">
											<h3 class="box-title">
											Choose Slider
											<!-- {!! Form::label('status','Status',array('class'=>'control-lable')) !!} -->
											</h3>
											<div class="box-tools pull-right">
												<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
												</div><!-- /.box-tools -->
												</div><!-- /.box-header -->
												<div class="box-body">
				@if($slider)
					 <select name="slider" id="slider" class="form-control">
					 	<option value="">Select Slider</option>
					 	@foreach($slider as $s)
								<option value="{{ $s->sliderid }}" <?php if($s->sliderid == $pages->slider){ echo 'selected';}?>>{{ $s->title }}</option>
					 	@endforeach

					 </select>
					 @endif												</div>
											</div>
											
											
											<div class="text-right">
												{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
											</div>
											
										</div>
										<!-- end of sidebar -->
										{!! Form::close() !!}
										
										
									</div>
								</div>
								@endsection