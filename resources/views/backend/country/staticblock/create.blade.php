@extends('layouts.app')
@section('htmlheader_title')
Country Block Create
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
		{!! Form::open( array( 'route'=> 'admin.country.block.store','accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12 countryblock-wrap inner-wrap">
		 <div class="firstsectionwrap">
		 <div class="sectionwrap">
		 	<input type="hidden" name="counter[]" value="0" class="counter">

			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('identifier','Identifier',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('identifier[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
						<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="countries" class="form-control">
								<option></option>
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}">{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					

					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
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
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image 
								<input type='file' onchange="readURL(this,'');" name="featuredimg[]" id="featuredimg" />
							</span>
  							
							<div class="bg-img"></div>
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
					
						{!! Form::select('backgroundoption[]', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),'' ,['class' => 'form-control','id' => 'Option'] ) !!}
					
					<div class="wrap-background-img" style="display:none;">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-default btn-file">
							 <i class="fa fa-folder-open"></i>Upload Image
							 {!! Form::file('bfile[]','',['class' => 'form-control'] ) !!}
							</span>
						
						</div>
						</div>
					</div>
					<div class="wrap-background-color" style="display:none;">
						<div id="pcolor" class="form-group colorpicker-component">
						{!! Form::label('bcolor','Background Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8 input-group colorpicker-component colorpicker-element">
						{!! Form::text('bcolor[]','',['class' => 'form-control color'] ) !!}
						<span class="input-group-addon"></span>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
 </div>
				
			<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		<!-- end of main-content -->

{!! Form::close() !!}
	
			
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addcountryblock btn btn-primary"><i class="fa fa-plus"></i> Add Country Block</a>
				</div>
			</div>
		</div>
	</div>

	<div class="countryaddblock" style="display:none;">
		<div class="sectionwrap inner-wrap second">
		<input type="hidden" name="counter[]" value="" class="counter">
		<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('identifier','Identifier',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('identifier[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content[]','',['class' => 'form-control textarea','id' => 'pagedesc'] ) !!}
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
							<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>Browse Image 
								<input type='file' onchange="" name="featuredimg[]" id="featuredimg" class="featuredimg" />
							</span>
  							
							<div class="bgimg" id="bgimg"></div>
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
					
						{!! Form::select('backgroundoption[]', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),'' ,['class' => 'form-control','id' => 'Option'] ) !!}
					
					<div class="wrap-background-img" style="display:none;">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-default btn-file">
							 <i class="fa fa-folder-open"></i>Upload Image
							 {!! Form::file('bfile[]','',['class' => 'form-control'] ) !!}
							</span>
						
						</div>
						</div>
					</div>
					<div class="wrap-background-color" style="display:none;">
						<div id="pcolor" class="form-group colorpicker-component">
						{!! Form::label('bcolor','Background Color',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8 input-group colorpicker-component colorpicker-element">
						{!! Form::text('bcolor[]','',['class' => 'form-control color'] ) !!}
						<span class="input-group-addon"></span>
						</div>
						</div>
					</div>
				</div>
			</div>
 </div>
	</div>
@stop