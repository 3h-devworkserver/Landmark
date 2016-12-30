@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')

<div class="spark-screen slider-wrap">
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
			
						
		{!! Form::open( array( 'route'=> 'slider.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
				<!-- start of main-content -->
			<div class="col-md-9" id="add-slider-wrap">
				
				<div class="inner-wrap">
					<input type="hidden" class="sliderid" name="sliderid" value="{{ $lastv }}">
					<input type="hidden" class="counter" name="counter[]" value="0">
					<div class="box box-solid">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]','',['class' => 'form-control textarea','id' => 'sliderdesc'] ) !!}
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
								<input type='file' onchange="readURL(this,'');" name="sliderimg[]" id="sliderimg" />
							</span>
  							
							<div class="bg-img"></div>
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
								<i class="fa fa-folder-open"></i>Browse Icon <input type='file' onchange="readURL1(this,'');" name="iconimg[]" id="iconimg" />
								</span>
								<p class="text-muted">Image Dimension(110X110)</p>
	  							
								<img src="#" alt="" class="icon-img">
									
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
										{!! Form::text('link[]','',['class' => 'form-control','id' => ''] ) !!}

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
										{!! Form::text('vurl[]','',['class' => 'form-control','id' => ''] ) !!}

									</div>
							</div>
						</div>
					</div>
					
				</div>

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
								    @foreach($pages as $type =>$page)

								        <option value="{{ $page->id }}">{{ $page->title }}</option>
								       
								    @endforeach 

								</select>
							</div>
						</div>
					

					
						<div class="text-right">
							{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
						</div>
					
					
				</div>
				<!-- end of sidebar -->
		{!! Form::close() !!}

			

				
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addmorebtn btn btn-primary"><i class="fa fa-plus"></i> Add New Slide</a>
				</div>
			</div>
		</div>
</div>

<div class="add" style="display:none;">
	<div class="inner-wrap second">
		<input type="hidden" class="counter" name="counter[]" value="">
		<!-- start of main-content -->
					<div class="box box-solid">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('caption','Caption',array('class'=>'col-sm-12 col-md-12 ')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('caption[]','',['class' => 'form-control textarea','id' => 'sliderdesc'] ) !!}
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
						<div class="box-body upload-block ">
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image <input type='file' onchange="" class="sliderimg" name="sliderimg[]" id="sliderimg"/>
							</span>
  							
							<div class="bgimg" id="bgimg"></div>

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
								<i class="fa fa-folder-open"></i>Browse Icon <input type='file' onchange="" name="iconimg[]" id="iconimg" class="iconimg" />
								</span>
								<p class="text-muted">Image Dimension(110X110)</p>
	  							
								<img src="#" alt="" class="iconimgs" id="iconimgs">

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
										{!! Form::text('link[]','',['class' => 'form-control','id' => ''] ) !!}

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
										{!! Form::text('vurl[]','',['class' => 'form-control','id' => ''] ) !!}

									</div>
							</div>
						</div>
					</div>
					
		<!-- end of main-content -->

	</div>
</div>

@endsection

