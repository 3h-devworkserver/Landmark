@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen slider-edit-page">
<div class="row">
		{!! Form::open( array( 'route'=> array('slider.update',$id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<div class="col-md-9" id="add-slider-wrap">
				@foreach( $sliders as $key=>$slider)
				<div class="inner-wrap @if($key > 0) {{ 'second' }} @endif ">
					<input type="hidden" class="id" name="id[]" value="{{ $slider->id }}">
					<input type="hidden" class="sliderid" name="sliderid" value="{{ $slider->sliderid }}">
					<input type="hidden" class="counter" name="counter[]" value="{{ $key }}">
					<div class="box box-solid">
						<div class="box-body">
							@if($key == 0)
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title', isset($slider) ? $slider->title : '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							@endif
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]',isset($slider) ? $slider->caption : '',['class' => 'form-control','id' => 'sliderdesc'] ) !!}
								</div>
							</div>
							
						</div>
					</div>

					<div class="box box-default">
						<div class="box-header with-border">
						<h3 class="box-title">
							Upload Slider Image
							<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
						</h3>
						<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
						</div><!-- /.box-tools -->
						</div><!-- /.box-header -->
						<div class="box-body upload-block">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image 
								@if($key == 0)
								<input type='file' onchange="readURL(this,'');" name="sliderimg[]" id="sliderimg" />
								@else
								<input type='file' onchange="readURL(this,<?php echo ($key); ?>);" name="sliderimg[]" id="sliderimg<?php echo ($key); ?>" />
								@endif
							</span>
  							@if($key == 0)
							<div class="bg-img" style="background-image:url('{{ asset('/img/slider/'. $slider->image) }}');"></div>
							@else
							<div class="bgimg" id="bgimg<?php echo ($key); ?>" style="background-image:url('{{ asset('/img/slider/'. $slider->image) }}');"></div>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="box box-default">
								<div class="box-header with-border">
								<h3 class="box-title">
									Icon Image
									<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
								</h3>
								<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
								</div><!-- /.box-tools -->
								</div><!-- /.box-header -->
								<div class="box-body upload-block">
								<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Icon 
								@if($key == '0')

								 <input type='file' onchange="readURL1(this,'');" name="iconimg[]" id="iconimg" />
								 @else
								 <input type='file' onchange="readURL1(this,<?php echo ( $key ); ?>);" name="iconimg[]" id="iconimg" />
								 @endif
								</span>
								<p class="text-muted">Image Dimension(110X110)</p>
	  							@if($key == 0)
								<img src="{{ asset('/img/slider/icon/'. $slider->iconimage) }}" alt="" class="icon-img" height="110" width="110">
								@else
								<img src="{{ asset('/img/slider/icon/'. $slider->iconimage) }}" alt="" class="iconimgs" id="iconimgs<?php echo ($key); ?>" height="110" width="110">
								@endif
									
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-default">
									<div class="box-header with-border">
									<h3 class="box-title">
										Add Link
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('link[]',isset($slider) ? $slider->link : '',['class' => 'form-control','id' => ''] ) !!}

									</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-default">
									<div class="box-header with-border">
									<h3 class="box-title">
										Video Url
										<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
									</h3>
									<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
									</div><!-- /.box-tools -->
									</div><!-- /.box-header -->
									<div class="box-body">
										{!! Form::text('vurl[]',isset($slider) ? $slider->videolink : '',['class' => 'form-control','id' => ''] ) !!}

									</div>
							</div>
						</div>
					</div>
					
				</div>
				@endforeach
			</div>

				<!-- end of main-content -->

				<!-- start of sidebar -->
				<div class="col-md-3">
					<div class="box box-default">
							<div class="box-header with-border">
							<h3 class="box-title">
								Select Page
								<!-- {!! Form::label('status','Status',array('class'=>'control-lable')) !!} -->
							</h3>
							<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
							</div><!-- /.box-tools -->
							</div><!-- /.box-header -->
							<div class="box-body">
							<select name="pageid" class="form-control">
									<option value="">Select Page</option>
								    @foreach($mainpages as $type =>$page)

								        <option value="{{ $page->id }}" <?php if($page->id == $sliders[0]->pageid ){ echo 'selected'; } ?> >{{ $page->title }}</option>
								       
								    @endforeach 

								</select>
							</div>
						</div>
					

					
						<div class="text-right">
							{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
						</div>
					
					
				</div>
		{!! Form::close() !!}
		</div>
</div>
@endsection