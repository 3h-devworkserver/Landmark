@extends('layouts.app')

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
	{!! Form::open( array( 'route'=> 'contact.store','method'=>'POST', 'class'=>'form-horizontal contactform' ) ) !!}


	<!-- start of main-content -->
	<div class="col-md-12 col-sm-12">
		<div class="box">
			<div class="box-body">
				<input type="hidden" class="counter" name="counter[]" value="0">
				<div class="form-group">
					{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('office','Office Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('office','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('address','Address',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('address','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('phone','Phone',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('phone','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email','E-mail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('email','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
			</div>
		</div>

		
		
    	<div class="text-right">
				{!! Form::submit('Save',array('class' => 'btn btn-primary')) !!}
		</div>
	</div>
	<!-- end of main-content -->


	{!! Form::close() !!}
	<!-- <div class="addmore">
		<button id="addcontact" class="btn btn-primary">Add More</button>
	</div> -->
</div>

<div class="add-box-body" style="display:none;">
		<div class="box-body">
			<input type="hidden" class="counter" name="counter[]" value="">
				<div class="form-group">
					{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title[]', '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('office','Office Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('office[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('address','Address',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('address[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('phone','Phone',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('phone[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email','E-mail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('email[]','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
			</div>
			</div>
</div>

@endsection