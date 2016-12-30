@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<div class="spark-screen edit-page">
<div class="row">
				
		
					@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open( array( 'route'=> array('testimonials.update',$testimonial->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
<!-- start of main-content -->
		
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('name','Name',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('name', (isset($testimonial))  ? $testimonial->name : '' ,['class' => 'form-control'] ) !!}

						</div>
					</div>
					<div class="form-group">
						{!! Form::label('jobtitle','Position',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('job_title', (isset($testimonial))  ? $testimonial->job_title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('company','Company',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('company', (isset($testimonial))  ? $testimonial->company : '' ,['class' => 'form-control'] ) !!}

						</div>
					</div>
					<div class="form-group">
						{!! Form::label('address','Address',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('address', (isset($testimonial))  ? $testimonial->address : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content', (isset($testimonial))  ? $testimonial->content : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of main-content -->

<!-- start of sidebar -->
<div class="col-md-3 col-sm-3 right-sidebar">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">
						Upload Featured Image
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				
					<div class="box-body upload-block">
						@if($testimonial->image != '')
						
						<img id="preview"  class="manage-width icon-img" src="{{ asset('/img/testimonial/'. $testimonial->image) }}" alt="Icon"/>
						@else
						<img src="#" class="icon-img" alt="" style="display:none;" height="230" width="230">
						@endif
						<span class="btn btn-primary btn-file btn-sm">
						<i class="fa fa-folder-open"></i>Change Image
						<input type='file' onchange="readfeatured1(this);" class="form-control" name="upload" id="fileimg" />
						</span>
						@if($testimonial->image != '')
							<a href="javascript:;" class="btn btn-danger btn-sm" data-table="testimonials" data-url="{{ $_SERVER['REQUEST_URI'] }}" data-id="{{ $testimonial->id }}" id="delete"><i class="fa fa-trash"></i>Delete</a>
						
						@endif
					
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Video Url
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
							{!! Form::text('url', (isset($testimonial))  ? $testimonial->url : '' ,['class' => 'form-control'] ) !!}
				</div>
			</div>
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Order
						<!-- {!! Form::label('file','Upload Featured Image',array('class'=>'control-lable')) !!} -->
					</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body upload-block">
					{!! Form::text('testimonial_order', (isset($testimonial))  ? $testimonial->testimonial_order : '' ,['class' => 'form-control'] ) !!}
				</div>
			</div>

				
				
			<div class="text-right">
				{!! Form::submit('Update',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>

		
	
{!! Form::close() !!}



		</div>
	</div>

@endsection