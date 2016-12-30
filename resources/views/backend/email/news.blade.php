@extends('layouts.app')
@section('htmlheader_title')
News &amp; Events Email Setting
@endsection
@section('main-content')
<div class="spark-screen add-page">
	<div class="row">
	@if(isset($text) || !empty($text))
	{!! Form::open( array( 'route'=> array('email.update',$text->id),'method'=>'PATCH', 'class'=>'form-horizontal contactform' ) ) !!}
		@else
	{!! Form::open( array( 'route'=> 'email.store','method'=>'POST', 'class'=>'form-horizontal contactform' ) ) !!}
	@endif	
	<input type="hidden" name="identify" value="1">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('emailsetting','News &amp; Events Email Setting',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::textarea('emailsetting', (isset($text) || !empty($text)) ? $text->content : '' ,['class' => 'form-control','id'=>'pagedesc'] ) !!}
					</div>
				</div>
			</div>
		</div>
		<div class="text-right">
	
@if(isset($text))
		 {!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
		 @else
		 {!! Form::submit('Save',array('class' => 'btn btn-primary')) !!}
		 @endif		</div>
	</div>
	<!-- end of main-content -->


	{!! Form::close() !!}
	</div>
</div>
@endsection