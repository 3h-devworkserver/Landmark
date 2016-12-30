@extends('layouts.app')
@section('htmlheader_title')
Institute Type Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.university.update',$universities->u_id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Institute Type',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($universities) ? $universities->university_name : '' ,['class' => 'form-control'] ) !!}
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