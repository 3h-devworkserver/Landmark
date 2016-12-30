@extends('layouts.app')
@section('htmlheader_title')
Country Edit
@endsection
@section('main-content')

<div class="spark-screen edit-page">
	
		<div class="row">
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> array('admin.country.accordion.update',$countriesaccordion->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		<div class="col-md-12 col-sm-12">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($countriesaccordion) ? $countriesaccordion->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
						<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="country" class="form-control">
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}" <?php if( $country->id == $countriesaccordion->country_id ){ echo 'selected'; } ?> >{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($countriesaccordion) ? $countriesaccordion->content : '',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
			
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		<!-- end of main-content -->


{!! Form::close() !!}
	
			
		</div>
	</div>
@stop