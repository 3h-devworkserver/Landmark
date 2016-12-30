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
		
		
{!! Form::open( array( 'route'=> 'setting.general.seo.store','accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
<div class="form-group">
{!! Form::label('meta-title','Meta Title',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
	
{!! Form::text('metatitle', (isset($seo))  ? $seo->meta_title : '' ,['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('meta-keyword','Meta Keyword',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
	
{!! Form::text('metakeyword', (isset($seo))  ? $seo->meta_keyword : '' ,['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('meta-description','Meta Description',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('meta-description',(isset($seo))  ? $seo->meta_desc : '',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('google-analytics','Google Analaytics',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::textarea('google-analytics',(isset($seo))  ? $seo->google_analytics : '',['class' => 'form-control ckeditor'] ) !!}
</div>
</div>

  <div class="checkbox">
    <label>
      {!! Form::checkbox('meta-robot','yes',(isset($seo))  ? 'true' : '',['class' => ''] ) !!} Meta Robots
    </label>
  </div>

</div>
</div>

		{!! Form::submit('Save Changes',array('class' => 'btn btn-primary')) !!}

	
{!! Form::close() !!}
				
			</div>
		</div>
	</div>
@endsection