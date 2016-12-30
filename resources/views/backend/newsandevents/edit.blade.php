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

{!! Form::open( array( 'route'=> array('events.update',$newsEvent->id),'files' => true,'accept-charset'=>'UTF-8','method'=>'PATCH', 'class'=>'form-horizontal' ) ) !!}
<!-- start of main-content -->
		<div class="col-md-9 col-sm-9">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::text('title', isset($newsEvent) ? $newsEvent->title : '' ,['class' => 'form-control'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('country','Country',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							<select name="country" id="countries" class="form-control">
								@foreach( $countries as $key=>$country)
								<option value="{{$country->id}}" <?php if( $country->id == $newsEvent->c_id ){ echo 'selected'; } ?> >{{$country->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('summary','Short Description',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('summary',isset($newsEvent) ? $newsEvent->summary : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('content','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('content',isset($newsEvent) ? $newsEvent->content : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::label('sidebar_content','Sidebar Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
						<div class="col-sm-12 col-md-12">
							{!! Form::textarea('sidebar_content',isset($newsEvent) ? $newsEvent->sidebar_content : '' ,['class' => 'form-control','id' => 'pagedesc'] ) !!}
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
			  	<div class="box-body">
			  		@if($eventimg)
			  		@foreach($eventimg as $key=>$img)
			  		<input type="hidden" name="eimg[]" value="{{$img->id}}">
			  		<div class="wrap">
			  		
			  		@if($key == 0)
			  		<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
						<input type="file" name="uploadimg[]" onchange="readURL12(this,'');" accept="image/*" class="icon-upload">
					</span>
					@else
					<span class="btn btn-default btn-file">
					<i class="fa fa-folder-open"></i>Upload Image
					<input type="file" name="uploadimg[]" onchange="readURL12(this,'{{ $key }}');" accept="image/*" class="icon-upload">
					</span>
					@endif
					@if(!empty($img->images))
					 <img id="preview"  class="manage-width <?php if($key == 0 ){ echo 'icon-imgs'; }else{ echo 'icon-img'.$key ;}?>" src="{{asset('/img/newsandevents/'.$img->images)}}"/>
					 @else
					 <img id="preview"  class="manage-width <?php if($key == 0 ){ echo 'icon-imgs'; }else{ echo 'icon-img'.$key ;}?>" src=""/>
					 @endif
					 <!-- <a href="javascript:;" id="deleteimg" data-id="{{$img->id}}" data-event-id="{{$img->event_id}}" class="manage-width">Delete</a> -->
					 </div>
					 @endforeach
					 @endif
				</div>
			<!-- /.box-body -->
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
					<!-- <input type="file" name="upload" onchange="readfeatured1(this);" accept="image/*" class="icon-upload"> -->
					 <!-- <img id="preview"  class="manage-width icon-img" src="{{ asset('img/newsandevents/'.$newsEvent->image) }}" alt="Icon" /> -->
					 	@if($newsEvent->image != '')
									<div class="bg-img featured-img" style="background-image:url('{{ asset('img/newsandevents/'.$newsEvent->image) }}');">
										
									</div>
									@else
									<div class="bg-img featured-img"></div>
									@endif
									<span class="btn btn-default btn-file">
									<i class="fa fa-folder-open"></i>Change Image
									<input type='file' onchange="readfeatured10(this,'featured-img');" class="form-control featured-img" name="file" id="fileimg" />
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
					 <!-- <img id="preview"  class="manage-width icon-img" src="{{ asset('img/newsandevents/'.$newsEvent->header_img) }}" alt="Icon" /> -->
					 @if($newsEvent->header_img != '')
									<div class="bg-img featured-img" style="background-image:url('{{ asset('img/newsandevents/'.$newsEvent->header_img) }}');">
										
									</div>
									@else
									<div class="bg-img header-img"></div>
									@endif
									<span class="btn btn-default btn-file ">
									<i class="fa fa-folder-open"></i>Change Image
									<input type='file' onchange="readfeatured10(this,'header-img');" class="form-control header-img" name="file" id="fileimg" />
									</span>
			</div><!-- /.box-body -->
			
			</div><!-- /.box -->
		<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Event Date</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					{!! Form::text('date',isset($newsEvent) ? $newsEvent->e_date : '',['class'=>'form-control datepicker', 'rows'=> '4', 'placeholder'=> 'Chose Date']) !!}
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
			  	{!! Form::text('news_order', isset($newsEvent) ? $newsEvent->news_order : '', ['min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order']) !!}
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
			   	<li>{!! Form::checkbox('cat[]', 'news',($newsEvent->category == 'news') ? 'true' : '') !!}{!! Form::label('News') !!}</li>
			  	<li>{!! Form::checkbox('cat[]', 'events',($newsEvent->category == 'events') ? 'true' : '') !!}{!! Form::label('Events') !!}</li>
			  	<li>{!! Form::checkbox('cat[]', 'events',($newsEvent->category == 'seminars') ? 'true' : '') !!}{!! Form::label('Seminars') !!}</li>
			  	</ul>
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
			

		  <div class="box-body">
				{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
				
		  </div><!-- /.box-body -->
      </div> 
	
{!! Form::close() !!}

</div>


	</div>

@endsection