@extends('layouts.app')

@section('htmlheader_title')
	Home
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
		<div class="row static-list">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> 'static.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal staticform' ) ) !!}
		<!-- start of main-content -->
		<div class="staticblock">
		<input type="hidden" name="counter[]" value="0" class="counter">
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('subtitle','Sub Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('subtitle[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('identifier','Identifier',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('identifier[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('url','Url',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
						{!! Form::text('url[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<!-- <div class="form-group">
						{!! Form::label('shortdescription','Short Description',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('shortdescription[]','',['class' => 'form-control','id' => 'shortdesc'] ) !!}
						</div>
					</div> -->
					<div class="form-group">
						{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('description[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
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
					
						{!! Form::select('backgroundoption[]', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),'' ,['class' => 'form-control','id' => 'Option'] ) !!}
					
					<div class="wrap-background-img" style="display:none;">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-primary btn-file">
								<i class="fa fa-folder-open"></i>Upload Image{!! Form::file('bfile[]','',['class' => 'form-control'] ) !!}
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
					    @foreach($pages as $type =>$page)

					        <option value="{{ $page->id }}">{{ $page->title }}</option>
					       
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
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					{!! Form::file('file[]','',['class' => 'form-control'] ) !!}
					</span>
					
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
					{!! Form::select('position[]', array(''=>'Select Option','top'=>'Top','bottom'=>'Bottom'),'' ,['class' => 'form-control'] ) !!}
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
					{!! Form::select('parallax[]', array(''=>'Select Option','parallax'=>'Parallax','no-parallax'=>'No Parallax'),'' ,['class' => 'form-control','id' => 'parallax'] ) !!}
				</div>
			</div>
				
			{!! Form::hidden('order[]', '0' ,['class' => 'form-control','id' => 'order'] ) !!}
				
			<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
</div>
{!! Form::close() !!}
	
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="addmore">
					<a href="javascript:;" class="addmoreblock btn btn-primary"><i class="fa fa-plus"></i> Add New Block</a>
				</div>
			</div>
		</div>
	</div>
<div class="addstatic" style="display:none;">
	<div class="staticblock">
		<div class="col-md-9 col-sm-9">
			<div class="heading">Another Static Block</div>
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
						{!! Form::label('subtitle','Sub Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('subtitle[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('identifier','Identifier',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('identifier[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('url','Url',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
						{!! Form::text('url[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<!-- <div class="form-group">
						{!! Form::label('shortdescription','Short Description',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('shortdescription[]','',['class' => 'form-control','id' => 'shortdesc'] ) !!}
						</div>
					</div> -->
					<div class="form-group">
						{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('description[]','',['class' => 'form-control textarea','id' => 'pagedesc'] ) !!}
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
					
						{!! Form::select('backgroundoption[]', array(''=>'Select Option','img'=>'Background Image','color'=>'Background Color'),'' ,['class' => 'form-control','id' => 'Option'] ) !!}
					
					<div class="wrap-background-img" style="display:none;">
						<div class="form-group">
						{!! Form::label('bfile','Background Image',array('class'=>'col-sm-4 control-lable')) !!}
						<div class="col-sm-8">
							<span class="btn btn-primary btn-file">
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
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					<span class="btn btn-default btn-file">
					<i class="fa fa-plus"></i>
					{!! Form::file('file[]','',['class' => 'form-control'] ) !!}
					</span>
					
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
					{!! Form::select('position[]', array(''=>'Select Option','top'=>'Top','bottom'=>'Bottom'),'' ,['class' => 'form-control'] ) !!}
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
					{!! Form::select('parallax[]', array(''=>'Select Option','parallax'=>'Parallax','no-parallax'=>'No Parallax'),'' ,['class' => 'form-control','id' => 'parallax'] ) !!}
				</div>
			</div>
				
			{!! Form::hidden('order[]','' ,['class' => 'form-control','id' => 'order'] ) !!}
		
		</div>
</div>
</div>
@endsection