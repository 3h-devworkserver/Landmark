@extends('layouts.app')
@section('htmlheader_title')
Institute Type Create
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
		{!! Form::open( array( 'route'=> 'admin.university.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12 universitywrap inner-wrap">
			<div class="firstsectionwrap">
				<div class="sectionwrap">
					<input type="hidden" name="counter[]" value="0" class="counter">
					<div class="box">
						<div class="box-body">
							<div class="form-group">
								{!! Form::label('title','Institute Type',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
								<div class="col-sm-12 col-md-12">
									{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
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
		{!! Form::close() !!}
		
	
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="addmore">
				<a href="javascript:;" class="addmoreuniversities btn btn-primary"><i class="fa fa-plus"></i> Add More Institute Type</a>
			</div>
		</div>
	</div>
</div>
<div class="universityadd" style="display:none;">
	<div class="sectionwrap inner-wrap second">
		<input type="hidden" name="counter[]" value="" class="counter">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('title','Institute Type',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop