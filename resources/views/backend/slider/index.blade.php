@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen slider-wrap">

<div class="row">
	<div class="col-sm-6 col-md-6">
		
	</div>
	<div class="col-md-6 col-md-6">
		<a href="{{ route('slides.create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add Slider</a>
	</div>
</div>
<div class="row">
	<div class="col-md-12 list">
		@if (count($sliders) > 0)
		<?php //echo '<pre>'; print_r($sliders); die(); ?>
		<table class="table table-bordered table-striped" id="example" width="100%">
			<thead>
				<tr>
					<th>Slider Id</th>
					<th>Title</th>
					<th>Action</th>
				</tr>
			</thead>
			
			
			<tbody>
				@foreach ($sliders as $key=>$slider)
				<tr>
					<td> {{ $slider->sliderid }}
					</td>
					<td>{{ $slider->title }}</td>
					<td><a class="btn btn-info btn-sm" href="{{ route('slider.edit',['parameter' => $slider->sliderid]) }}"><i class="fa fa-pencil"></i> </a> | <a class="btn btn-danger btn-sm" href="{{ route('slider.delete',['parameter' => $slider->sliderid]) }}"><i class="fa fa-trash-o"></i></a></td>
				</tr>
				
				@endforeach
			</tbody>
		</table>
		@else
		<table class="table table-bordered table-striped" id="example" width="100%">
			<tbody>
				<tr>
					<td>No Page Added</td>
				</tr>
			</tbody>
		</table>
		@endif
	</div>
</div>
</div>
@endsection