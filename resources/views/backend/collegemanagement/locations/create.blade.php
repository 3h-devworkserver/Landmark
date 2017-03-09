@extends('layouts.app')
@section('htmlheader_title')
Location Create
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
		{!! Form::open( array( 'route'=> 'admin.location.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="location-wrap">
			<div class="firstsectionwrap ">
				<div class="sectionwrap col-md-9 col-sm-9">
					<input type="hidden" name="counter[]" value="0" class="counter">
					<div class="box">
						<div class="box-body">
							
							<div class="form-group">
								{!! Form::label('name','Name',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('name[]', '' ,['class' => 'form-control'] ) !!}
								</div>
							</div>
							<div class="form-group">
								{!! Form::label('slug','Slug',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('slug[]','',['class' => 'form-control'] ) !!}
								</div>
							</div>
							
						</div>
						
					</div>
					
				</div>
				
				<div class="col-md-3 col-sm-3 right-sidebar">
					
					<div class="text-right">
						{!! Form::submit('Save',array('class' => 'btn btn-primary')) !!}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
		
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="addmore">
				<a href="javascript:;" class="addlocation btn btn-primary"><i class="fa fa-plus"></i> Add Another</a>
			</div>
		</div>
	</div>
</div>
<div class="locationadd" style="display:none;">
	<div class="sectionwrap second">
		<input type="hidden" name="counter[]" value="" class="counter">
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('name','Name',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('name[]', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('slug','Slug',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('slug[]','',['class' => 'form-control'] ) !!}
						</div>
					</div>
					
					
				</div>
			</div>
			
		</div>
		
	</div>
</div>
@stop