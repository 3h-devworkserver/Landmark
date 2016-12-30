@extends('layouts.app')

@section('main-content')
<div class="spark-screen edit-page">

<div class="row">
	{!! Form::open( array( 'route'=> array('contact.update',$contact->id),'method'=>'PATCH', 'class'=>'form-horizontal contactform' ) ) !!}


	<!-- start of main-content -->
	<div class="col-md-12 col-sm-12">
		<div class="box">
			<div class="box-body">
				<input type="hidden" class="counter" name="counter[]" value="0">
				<div class="form-group">
					{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title', (isset($contact))  ? $contact->title : '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('office','Office Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('office',(isset($contact))  ? $contact->office_name : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('address','Address',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('address',(isset($contact))  ? $contact->address : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('phone','Phone',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('phone',(isset($contact))  ? $contact->phone : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('email','E-mail',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('email',(isset($contact))  ? $contact->email : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
			</div>
		</div>

		
		
    	<div class="text-right">
				{!! Form::submit('Edit',array('class' => 'btn btn-primary')) !!}
		</div>
	</div>
	<!-- end of main-content -->


	{!! Form::close() !!}
	<!-- <div class="addmore">
		<button id="addcontact" class="btn btn-primary">Add More</button>
	</div> -->
</div>
</div>
@endsection