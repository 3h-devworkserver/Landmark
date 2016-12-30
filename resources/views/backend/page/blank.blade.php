<div class="spark-screen add-page">
		<div class="row">
			<div class="col-md-12">
				
					<!-- <div class="panel-heading">Create Page</div> -->
		
					@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open( array( 'route'=> 'page.store','files' => true,'accept-charset'=>'UTF-8','method'=>'POST', 'class'=>'form-horizontal' ) ) !!}
<div class="row-fluid">

	<!-- start of main-content -->
	<div class="col-md-8">
		<div class="box">
			<div class="box-body">
				<div class="form-group">
					{!! Form::label('title','Title',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::text('title', '' ,['class' => 'form-control'] ) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('description','Content',array('class'=>'col-sm-12 col-md-12 control-lable')) !!}
					<div class="col-sm-12 col-md-12">
						{!! Form::textarea('description','',['class' => 'form-control','id' => 'pagedesc'] ) !!}
					</div>
				</div>
			</div>
		</div>

		
			<div class="box box-default">
				<div class="box-header with-border">
				<h3 class="box-title">SEO Options</h3>
				<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						{!! Form::label('slideroption','Slider Option',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::select('slider',array(''=>'Select Option','1'=>'Enable','0'=>'Disable'),'', ['class' => 'form-control'] ) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('meta_title','Meta Title',array('class'=>'col-sm-3 col-sm-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::text('meta_title','',['class' => 'form-control'] ) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('meta_key','Meta Keyword',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
						{!! Form::text('meta_key','',['class' => 'form-control'] ) !!}
						</div>
					</div>

					<div class="form-group">
						{!! Form::label('meta_desc','Meta Description',array('class'=>'col-sm-3 col-md-3 control-lable')) !!}
						<div class="col-sm-9 col-md-9">
							{!! Form::text('meta_desc','',['class' => 'form-control'] ) !!}
						</div>
					</div>
				</div>
			</div>

		
	</div>
	<!-- end of main-content -->

	<!-- start of sidebar -->
	<div class="col-md-4">
		<div class="form-group">
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
				<div class="box-body">
					{!! Form::file('file','',['class' => 'form-control'] ) !!}

				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="box box-default">
				<div class="box-header with-border">
				<h3 class="box-title">
					Status
					<!-- {!! Form::label('status','Status',array('class'=>'control-lable')) !!} -->
				</h3>
				<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-angle-up"></i></button>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					{!! Form::select('status',array('draft'=>'Draft','publish'=>'Publish'),'', ['class' => 'form-control'] ) !!}

				</div>
			</div>
		</div>

		<div class="form-group">
			<div class="text-right">
				{!! Form::submit('Publish',array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
		
	</div>
	<!-- end of sidebar -->

</div>	
{!! Form::close() !!}

				
			</div>
		</div>
</div>