@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


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
		<!-- <div class="panel-heading">Create Static Block</div> -->
		{!! Form::open( array( 'route'=> 'post.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
		<!-- start of main-content -->
		
       	<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					
					<div class="form-group">
						{!! Form::label('url','Url',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('url','',['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of main-content -->

		<!-- start of sidebar -->
		   <div class="col-md-3">
       		<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Image</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					 <div id="preview" class="manage-width featured-img"/>
			  	<span class="btn btn-primary btn-file btn-sm">
					<i class="fa fa-folder-open"></i>Upload Image<input type="file" name="upload" onchange="readfeatured(this);" accept="image/*" class="icon-upload">
					</span>
					
					 <!-- <img id="preview"  class="manage-width icon-img" src="#" alt="Icon" style="display:none;" /> -->
			</div><!-- /.box-body -->
			
			</div><!-- /.box -->
       <!-- </div> -->


       	<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Post Order</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	{!! Form::text('post_order', null, ['class'=>'form-control', 'placeholder'=>'Enter Order']) !!}
			  </div><!-- /.box-body -->
			</div><!-- /.box -->

			<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Category</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	@if($categories)
			  	<ul class="list-unstyled">
			  	@foreach($categories as $cat)
			   	<li>
			   		{!! Form::checkbox('cat[]', $cat->id) !!}{!! Form::label(trans($cat->category)) !!}
			   	</li>
			   	@endforeach
			  	</ul>
			  	@endif
			  </div><!-- /.box-body -->
			</div><!-- /.box -->

		  <div class="box-body">
				{!! Form::submit('Add Post',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->
       
       </div>

{!! Form::close() !!}
	
			
		</div>
	</div>

@endsection