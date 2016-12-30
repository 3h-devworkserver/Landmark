@extends('layouts.app')
@section('htmlheader_title')
College Create
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
		{!! Form::open( array( 'route'=> 'admin.college.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="college-wrap">
			<div class="firstsectionwrap ">
				<div class="sectionwrap col-md-9 col-sm-9">
					<input type="hidden" name="counter[]" value="0" class="counter">
					<div class="box">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('university','Institution Type',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="institute" id="university" class="form-control" placeholder="Choose University">
										<option>Choose Institute Type</option>
										@foreach( $universities as $key=>$university)
										<option value="{{$university->u_id}}">{{$university->university_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('title','College Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('name[]', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('content','College Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('content[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('contact','Contact Number',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('contact[]','',['class' => 'form-control'] ) !!}
								</div>
							</div>
							
							<div class="form-group">
								{!! Form::label('location','Location',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="location[]" id="location" class="form-control" placeholder="Choose Location">
										<option>Choose Location</option>
										@foreach( $locations as $key=>$location)
										<option value="{{$location->id}}">{{$location->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						
					</div>
				<!-- 	<div class="box">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('course','Course',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									<select name="course[]" id="course" class="form-control" placeholder="Choose Slider">
										
										<option value="" selected>Choose course</option>
										@foreach( $courses as $key=>$course)
										<option value="{{$course->id}}">{{$course->course_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('coursecontent','Course Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::textarea('coursecontent[]','',['class' => 'form-control','id' => 'coursepagedesc'] ) !!}
								</div>
							</div>
							
						</div>
						
					</div> -->
				
				</div>
				
				<div class="col-md-3 col-sm-3 right-sidebar">
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
									<select name="slider[]" id="slider" class="form-control" placeholder="Choose Slider">
										<option value="">Choose Slider</option>
										@foreach( $sliders as $key=>$slider)
										<option value="{{$slider->id}}">{{$slider->title}}</option>
										@endforeach
									</select>
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
													<div class="text-right">
														{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
													</div>
												</div>
											</div>
										</div>
										
										
										<!-- </div> -->
										<!-- end of main-content -->
										<!-- start of sidebar -->
										<!-- <div class="col-md-3 col-sm-3 right-sidebar">
												
												
												
										</div> -->
										{!! Form::close() !!}
										
										
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="addmore">
												<a href="javascript:;" class="addmorecollege btn btn-primary"><i class="fa fa-plus"></i> Add New College</a>
											</div>
										</div>
									</div>
								</div>
								<div class="collegeadd" style="display:none;">
									<div class="sectionwrap inner-wrap second">
										<input type="hidden" name="counter[]" value="" class="counter">
										<div class="col-md-9 col-sm-9">
											<div class="box">
												<div class="box-body">
													<div class="form-group">
														{!! Form::label('title','College name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
														</div>
													</div>
													<div class="form-group">
														{!! Form::label('content','College Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															{!! Form::textarea('content[]','',['class' => 'form-control textarea','id' => 'pagedesc'] ) !!}
														</div>
													</div>
													<div class="form-group">
														{!! Form::label('contact','Contact Number',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															{!! Form::text('contact[]','',['class' => 'form-control'] ) !!}
														</div>
													</div>
													<div class="form-group">
														{!! Form::label('location','Location',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															<select name="location[]" id="location" class="form-control" placeholder="Choose Location">
																<option>Choose Location</option>
																@foreach( $locations as $key=>$location)
																<option value="{{$location->id}}">{{$location->name}}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="box">
												<div class="box-body">
													<div class="form-group">
														{!! Form::label('course','Course',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															<select name="course[]" id="course" class="form-control" placeholder="Choose Slider">
																<option value="">Choose course</option>
																@foreach( $courses as $key=>$course)
																<option value="{{$course->id}}">{{$course->course_name}}</option>
																@endforeach
															</select>
														</div>
													</div>
													<div class="form-group">
														{!! Form::label('coursecontent','Course Detail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
														<div class="col-sm-12 col-md-12">
															{!! Form::textarea('coursecontent[]','',['class' => 'form-control coursepagedesc','id' => 'coursepagedesc'] ) !!}
														</div>
													</div>
													
												</div>
												
											</div> -->
										</div>
										<div class="col-md-3 col-sm-3 right-sidebar">
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
									<select name="slider[]" id="slider" class="form-control" placeholder="Choose Slider">
										<option value="">Choose Slider</option>
										@foreach( $sliders as $key=>$slider)
										<option value="{{$slider->id}}">{{$slider->title}}</option>
										@endforeach
									</select>
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
														</div>
														@stop