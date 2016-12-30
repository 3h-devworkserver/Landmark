@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('static.new') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add new</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($pages) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Page</th>
							<th>Title</th>
							<th>Sub Title</th>
							<th>Position</th>
							<th>Url</th>
							<th>Identifier</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($pages as $key=>$page)
						<tr>
							<td>  {{ $key + 1 }}
							</td>
							<td>{{ $page->title }}</td>
							<td>{{ $page->static_title }}</td>
							<td>{{ $page->sub_title }}</td>
							<td>{{ $page->position }}</td>
							<!-- <td><img src="{{ asset('/img/'. $page->featured_image) }}" height="100" width="100"></td> -->
							<td>{{ $page->url }}</td>
							<td>{{ $page->identifier }}</td>
							<!-- <td>{{ $page->ordering }}</td> -->
							<td><a class="btn btn-info btn-sm" href="{{ route('static.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('static.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No Page Added</tr></td></tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection