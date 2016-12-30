@extends('layouts.app')

@section('htmlheader_title')
	Edit Post category
@endsection


@section('main-content')
<div class="spark-screen add-page">
	<div class="row">
		<div class="col-md-6">
		 {!! Form::open( array( 'route'=> array('category.update',$postcat->id),'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($postcat) ? $postcat->category : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					
					<div class="form-group">
						{!! Form::label('slug','Slug',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('slug',isset($postcat) ? $postcat->category_slug : '',['class' => 'form-control'] ) !!}
						</div>
					</div>
			
				</div>
			</div>
		 <div class="box-body">
				{!! Form::submit('Update Category',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->

		 {!! Form::close() !!}
		</div>
		</div>
		</div>
@endsection