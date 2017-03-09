@extends('layouts.app')
@section('htmlheader_title')
Location Edit
@endsection
@section('main-content')
<div class="spark-screen edit-page">
	
	<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.location.update',$locations->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					
					<div class="form-group">
						{!! Form::label('name','Name',array('class'=>'col-sm-12 col-md-12 control-lable required')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('name', isset($locations) ? $locations->name : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('slug',isset($locations) ? $locations->slug : '',['class' => 'form-control'] ) !!}
						</div>
					</div>
					
				</div>
			</div>
				<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		{!! Form::close() !!}
		
		
	</div>
</div>
@stop