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
		{!! Form::open( array( 'route'=> 'testimonials.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
	
	<div class="col-md-9">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Create Page</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         
			<div class="row">
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label class="col-md-2 control-label">Name</label>
						
					<div class="col-md-12">
						{{Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter Your Name'])}}
					</div>
					@if($errors->has('name'))
						<span class="help-block">
                           <strong>{{ $errors->first('name') }}</strong>
                        </span>
					@endif
				</div>
			</div>
			<br>

		<div class="row">
			<label class="col-md-2 control-label">Job Title</label>
			<div class="col-md-12">
			{{Form::text('job_title',null,['class'=>'form-control', 'placeholder'=>'Enter your Job Title'])}}
			</div>
		</div>
		<br>


		<div class="row">
			<label class="col-md-2 control-label">Company</label>
			<div class="col-md-12">
			{{Form::text('company',null,['class'=>'form-control', 'placeholder'=>'Enter Company Name'])}}
			</div>
		</div>
		<br>

		<div class="row">
			<label class="col-md-2 control-label">Address</label>
			<div class="col-md-12">
			{{Form::text('address',null,['class'=>'form-control', 'placeholder'=>'Enter Address'])}}
			</div>
		</div>
		<br>

		<div class="row">
			<label class="col-md-2 control-label">Content</label>
			<div class="col-md-12">
			{{Form::textarea('content',null,['class'=>'form-control ckeditor', 'placeholder'=>'Enter Content'])}}
			</div>
		</div>
		<br>

            </div>
            <!-- /.box-body -->
          </div>

       </div>


       <div class="col-md-3">
       		<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Image</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					<input type="file" name="upload" onchange="readfeatured1(this);" accept="image/*" class="icon-upload">
					 <img id="preview"  class="manage-width icon-img" src="#" alt="Icon" style="display:none;" />
					 @if(!empty($testimonial->image))
				<div class="row" id="img-preview">
						<div class="col-md-12">
							<img src="{{url('public/img/testimonial/'.$testimonial->image)}}" alt = "image preview" title="image preview" class="manage-width icon-img">
						</div>
				</div>
				<br>
			@endif
			  </div><!-- /.box-body -->
			
			</div><!-- /.box -->
       <!-- </div> -->

       <div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Order</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			@if(empty($testimonial))
			  	{{Form::number('testimonial_order', 0, [ 'min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order'])}}
			@else
			  	{{Form::number('testimonial_order', null, [ 'min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order'])}}
			@endif		 
			  </div><!-- /.box-body -->
			
			</div><!-- /.box -->

       <div>
			  <div class="box-body">
					@if(empty($testimonial))
						{{Form::submit('Add Testimonial',['class'=>'btn bg-olive'])}}
					@else
						{{Form::submit('Update',['class'=>'btn bg-olive'])}}
					@endif
			  </div><!-- /.box-body -->
       </div>

       
       </div>

      </div>  <!-- row -->		
  {{Form::close()}}



    </div>

@endsection