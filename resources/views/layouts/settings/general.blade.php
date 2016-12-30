@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="spark-screen setting">
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
			<div class="col-md-12 col-sm-12">
				
					
		<div class="box">
			<div class="box-body">
					
{!! Form::open( array( 'route'=> 'setting.general.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
<div class="form-group">
{!! Form::label('sitename','Sitename',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
	
{!! Form::text('sitename', (isset($generals))  ? $generals->site_name : '' ,['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('description','Tagline',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('description',(isset($generals))  ? $generals->tagline : '',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('email','Admin Email',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::email('admin_email',(isset($generals))  ? $generals->admin_email : '',['class' => 'form-control'] ) !!}
</div>
</div>

<div class="form-group">
{!! Form::label('file','Upload Logo',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12 upload-block">
	
		<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>
								Browse Image 
		<input type='file' onchange="readfeatured10(this,'icon-img');" name="image" id="image" />
		</span>

@if($generals->logo != '')
<div class="icon-img" style="background-image:url( {{ asset('/img/'. $generals->logo ) }} ); min-height:100px; background-repeat:no-repeat;"></div>
@else
<div class="icon-img" style="min-height:100px; background-repeat:no-repeat; display:none;"></div>
@endif
</div>
</div>

<div class="form-group">
{!! Form::label('favicon','Favicon',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12 upload-block">
	
		<span class="btn btn-default btn-file">
								<i class="fa fa-folder-open"></i>
								Browse Image 
		<input type='file' onchange="readfeatured10(this,'bg-imgs');" name="favicon" id="favicon" />
		</span>

@if($generals->favicon != '')
<div class="bg-imgs" style="background-image:url( {{ asset('/img/'. $generals->favicon) }} ); min-height:50px; min-width:40px; background-repeat:no-repeat;"></div>
@else
<div class="bg-imgs" style="min-height:50px; min-width:40px; background-repeat:no-repeat; display:none;"></div>
@endif
</div>
</div>

<div class="form-group">
{!! Form::label('mapaddress','Map Address',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('mapaddress',(isset($generals))  ? $generals->map_address : '',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('map_lat','Map Latitude',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('map_lat',(isset($generals))  ? $generals->map_lat : '',['class' => 'form-control'] ) !!}
</div>
</div>
<div class="form-group">
{!! Form::label('map_lon','Map longitude',array('class'=>'col-sm-12 control-lable')) !!}
<div class="col-sm-12">
{!! Form::text('map_lon',(isset($generals))  ? $generals->map_lon : '',['class' => 'form-control'] ) !!}
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
