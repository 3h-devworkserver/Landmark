@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')

<div class="spark-screen">
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
		{!! Form::open( array( 'route'=> 'events.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
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
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="country" class="form-control">
								<option></option>
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}">{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('summary','Short Description',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('summary','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('sidebar_content','Sidebar Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('sidebar_content','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
				</div>
			</div>

			<div class="box box-default" id="uploadimg">
			  <div class="box-header with-border">
			    <h3 class="box-title">Upload Image</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  	<div class="box-body news-image-add upload-block">
			  		<div class="wrap">
			  			<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Upload Image
									<input type="file" name="uploadimg[]" onchange="readURL12(this,'');" accept="image/*" class="icon-upload">
									</span>	
					
					 <img id="preview"  class="manage-width icon-imgs" src="#" alt="Icon" style="display:none;" />
					 </div>
				</div>
			<!-- /.box-body -->
			 <div class="addimg">
			 	<span class="btn btn-primary"> <i class="fa fa-plus"></i>Add more</span></div>
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
									<div class="bg-img featured-img" style="display:none;"></div>
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Upload Image
									<input type='file' onchange="readfeatured10(this,'featured-img');" class="form-control" name="file" id="fileimg" />
									</span>			
								</div><!-- /.box-body -->
			
			</div><!-- /.box -->
			<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Header Image</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					<!-- <input type="file" name="headerimg" onchange="readfeatured1(this);" accept="image/*" class="icon-upload"> -->
					 <!-- <img id="preview"  class="manage-width icon-img" src="#" alt="Icon" style="display:none;" /> -->
					         		<div class="bg-img header-img" style="display:none;"></div>
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Upload Header Image
									<input type='file' onchange="readfeatured10(this,'header-img');" class="form-control" name="file" id="fileimg" />
									</span>
			</div><!-- /.box-body -->
			
			</div><!-- /.box -->
       <!-- </div> -->

       <!-- <div class="col-md-3"> -->
       		<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Event Date</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					{!! Form::text('date',null,['class'=>'form-control datepicker', 'rows'=> '4', 'placeholder'=> 'Chose Date']) !!}
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
       <!-- </div> -->

       	<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Order</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			  	{!! Form::text('news_order', null, ['min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order']) !!}
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
			  	<ul class="list-unstyled">
			   	<li>{!! Form::checkbox('cat[]', 'news') !!}{!! Form::label('News') !!}</li>
			  	<li>{!! Form::checkbox('cat[]', 'events') !!}{!! Form::label('Events') !!}</li>
			  	<li>{!! Form::checkbox('cat[]', 'seminars') !!}{!! Form::label('Seminars') !!}</li>
			  	</ul>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->

		  <div class="box-body">
				{!! Form::submit('Add News and Event',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->
       
       </div>

{!! Form::close() !!}
	
			
		</div>
	</div>

@endsection