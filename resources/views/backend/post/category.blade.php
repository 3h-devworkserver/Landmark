@extends('layouts.app')

@section('htmlheader_title')
	Post category
@endsection


@section('main-content')
<div class="spark-screen add-page">
	<div class="row">
		<div class="col-md-4">
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
		<div class="col-md-4">
		 {!! Form::open( array( 'route'=> 'post.store.category','accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					
					<div class="form-group">
						{!! Form::label('slug','Slug',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('slug','',['class' => 'form-control'] ) !!}
						</div>
					</div>
			
				</div>
			</div>
		 <div class="box-body">
				{!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->

		 {!! Form::close() !!}
		</div>
		@if($postcat)
		<div class="col-md-8">
			<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Slug</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
			@foreach($postcat as $post)
			<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $post->category }}</td>
							<td>{{ $post->category_slug }}</td>
							<td>
								<a class="btn btn-info btn-sm" href="{{ route('category.edit',['parameter' => $post->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('category.delete',['parameter' => $post->id]) }}"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php $k++; ?>
			@endforeach
		</tbody>
	</table>
		</div>
		@endif
	</div>
</div>
@endsection
