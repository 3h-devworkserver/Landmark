@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<div class="spark-screen setting">
		<div class="row">
			<div class="col-md-12 col-sm-12">
						<div class="box">
			<div class="box-body">
		
		
{!! Form::open( array( 'route'=> 'setting.social.store','accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
<div class="form-group">
{!! Form::label('facebook','Facebook',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
	
{!! Form::text('facebook', (isset($social))  ? $social->facebook : '#' ,['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('twitter','Twitter',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
	
{!! Form::text('twitter', (isset($social))  ? $social->twitter : '#' ,['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('google-plus','Google Plus',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('google-plus',(isset($social))  ? $social->google_plus : '#',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('youtube','Youtube',array('class'=>'col-sm-4 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('youtube',(isset($social))  ? $social->youtube : '#',['class' => 'form-control ckeditor'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('tumblr','Tumblr',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('tumblr',(isset($social))  ? $social->tumblr : '#',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('pinterest','Pinterest',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('pinterest',(isset($social))  ? $social->pinterest : '#',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('linkedin','Linkedin',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('linkedin',(isset($social))  ? $social->linkedin : '#',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('vimeo','Vimeo',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('vimeo',(isset($social))  ? $social->vimeo : '#',['class' => 'form-control'] ) !!}
</div>
</div>

				</div>
			</div>

		{!! Form::submit('Save Changes',array('class' => 'btn btn-primary')) !!}

	
{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection