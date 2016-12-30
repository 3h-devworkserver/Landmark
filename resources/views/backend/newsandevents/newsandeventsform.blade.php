@extends('admin.layout.app',['title' => $title, 'activeNews' => 'active'])

@section('content')
<section class="content-header">
  <h1>
   @if(empty($newsEvent))
   		Add News and Event
   @else
   		Edit News and Event
   @endif
    <!-- <small>Lists of Pages</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">News and Events</a></li>
    <li class="active">
    	@if(empty($newsEvent))
	   		Add News and Event
	   @else
	   		Edit News and Event
	   @endif
	</li>
  </ol>
</section>



 <!-- Main content -->
    <section class="content">
     @if(empty($newsEvent))
            {{Form::open(['url'=>'admin/newsandevents', 'files'=> 'true'])}}
          @else
            {{Form::model($newsEvent,['url'=>'admin/newsandevents/'.$newsEvent->id, 'method'=>'PATCH', 'files'=> 'true'])}}
          @endif
<div>
<div class="row">
	<div class="col-md-9">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Create Page</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
         
			<div class="row">
				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					<label class="col-md-2 control-label">Title</label>
						
					<div class="col-md-12">
						{{Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Enter Title'])}}
					</div>
					@if($errors->has('title'))
						<span class="help-block">
                           <strong>{{ $errors->first('title') }}</strong>
                        </span>
					@endif
				</div>
			</div>
			<br>

			<div class="row">
			<label class="col-md-3 control-label">Short Description</label>
			<div class="col-md-12">
			{{Form::textarea('summary',null,['class'=>'form-control ckeditor', 'placeholder'=>'Enter Short Description'])}}
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

		{!! Html::script('public/vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}

		
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
					<input type="file" name="upload" onchange="readURL(this);" accept="image/*" class="icon-upload">
					 <img id="preview"  class="manage-width" src="#" alt="Icon" style="display:none;" />
					 @if(!empty($newsEvent->image))
				<div class="row" id="img-preview">
						<div class="col-md-12">
							<img src="{{url('public/img/newsandevents/'.$newsEvent->image)}}" alt = "image preview" title="image preview" class="manage-width">
						</div>
				</div>
				<br>
			@endif
			  </div><!-- /.box-body -->
			
			</div><!-- /.box -->
       <!-- </div> -->

       <!-- <div class="col-md-3"> -->
       		<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Tagline</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
					{{Form::textarea('tagline',null,['class'=>'form-control', 'rows'=> '4', 'placeholder'=> 'Enter Tagline'])}}
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
       <!-- </div> -->

       `	<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Order</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			@if(empty($news_order))
			  	{{Form::number('news_order', 0, [ 'min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order'])}}
			@else
			  	{{Form::number('news_order', null, ['min' => '0', 'class'=>'form-control', 'placeholder'=>'Enter Order'])}}
			@endif
			  </div><!-- /.box-body -->
			</div><!-- /.box -->

		  <div class="box-body">
				@if(empty($newsEvent))
					{{Form::submit('Add News and Event',['class'=>'btn bg-olive'])}}
				@else
					{{Form::submit('Update',['class'=>'btn bg-olive'])}}
				@endif
		  </div><!-- /.box-body -->
       
       </div>

      </div>  <!-- row -->		
  {{Form::close()}}



    </section>

    <script type="text/javascript">
    	function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result).show();
            $('#img-preview').hide();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

    </script>



@endsection