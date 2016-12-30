@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen theme_option_page add-page">
	{!! Form::open( array( 'route'=> 'theme.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'' ) ) !!}
	<div class="row">
		<div class="col-md-7 col-sm-7">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Typography</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="heading-wrapper">
					
					<div class="form-group colorpicker-component">
						{!! Form::label('h1color','H1 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
								<div id="color1" class="input-group colorpicker-component colorpicker-element">
									{!! Form::text('h1color','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
									<span class="input-group-addon"><i></i></span>
								</div>
								
							</div>
							<div class="col-md-6">
								<select name="h1font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('h2color','H2 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
							<div id="color2" class="input-group colorpicker-component colorpicker-element">
								{!! Form::text('h2color','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
								<span class="input-group-addon"><i></i></span>
							</div>
						</div>
							<div class="col-md-6">
								<select name="h2font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('h3color','H3 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
							<div id="color3" class="input-group colorpicker-component colorpicker-element">
								{!! Form::text('h3color','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
								<span class="input-group-addon"><i></i></span>
							</div>
							</div>
							<div class="col-md-6">
								<select name="h3font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('h4color','H4 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
								<div id="color4" class="input-group colorpicker-component colorpicker-element">
									{!! Form::text('h4color','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
									<span class="input-group-addon"><i></i></span>
								</div>
							</div>
							<div class="col-md-6">
								<select name="h4font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('h5color','H5 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
							<div id="color5" class="input-group colorpicker-component colorpicker-element">
								{!! Form::text('h5color','',['class' => 'form-control', 'placeholder' => 'Choose Color'] ) !!}
								<span class="input-group-addon"><i></i></span>
							</div>
						</div>
							<div class="col-md-6">
								<select name="h5font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('h6color','H6 Color',array('class'=>'control-lable')) !!}
						<div class="row">
							<div class="col-md-6">
							<div id="color6" class="input-group colorpicker-component colorpicker-element">
								{!! Form::text('h6color','',['class' => 'form-control', 'placeholder' => 'Choose Color'] ) !!}
								<span class="input-group-addon"><i></i></span>
							</div>
						</div>
							<div class="col-md-6">
								<select name="h6font" class="form-control">
									<option value="">Select font-size</option>
									@for($i = 10; $i <= 40; $i++ )
									<option value="{{ $i }}">{{ $i }}</option>
									
									@endfor
								</select>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-5 col-sm-5">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Colors</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="color-wrapper">
					
					<div class="form-group colorpicker-component">
						{!! Form::label('bcolor','Primary Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div id="pcolor" class="col-sm-8 input-group colorpicker-component colorpicker-element">
							{!! Form::text('bcolor','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
							<span class="input-group-addon"><i></i></span>
						</div>
					</div>
					<div class="form-group colorpicker-component">
						{!! Form::label('bcolor','Secondary Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div id="scolor" class="col-sm-8 input-group colorpicker-component colorpicker-element">
							{!! Form::text('bcolor','',['class' => 'form-control color', 'placeholder' => 'Choose Color'] ) !!}
							<span class="input-group-addon"><i></i></span>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Header Image</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="header-wrapper">
					<div class="form-group">
						<!-- {!! Form::label('header-img','Header Image',array('class'=>'col-sm-4 control-lable')) !!} -->
						<span class="btn btn-default btn-file">
					<i class="fa fa-plus"></i><input type="file" id="file" name="file">
					</span>
						<!-- {!! Form::file('image','',['class' => 'form-control'] ) !!}	 -->

					</div>
				</div>
				</div>
			</div>

			<div class="text-right">
				{!! Form::submit('Save Changes',array('class' => 'btn btn-primary')) !!}
			</div>
			
		</div>
	</div>
	{!! Form::close() !!}

</div>

@endsection