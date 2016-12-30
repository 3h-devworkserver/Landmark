@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<ul class="list-unstyled list-inline pull-left">
					<li><a href="{{ route('page.sorting',['parameter' => 'all']) }}">All</a> ( {{ $all }} ) | </li>
					<li><a href="{{ route('page.sorting',['parameter' => 'publish']) }}">Published</a> ( {{ $publish }} ) |</li>
					<li><a href="{{ route('page.sorting',['parameter' => 'draft']) }}">Draft</a> ( {{ $draft }} )</li>
				</ul>
				<a href="{{ route('page.new') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add new</a>
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
							<th>Title</th>
							<!-- <th>Slider Id</th> -->
							<!-- <th>Featured Image</th> -->
							<th>Meta Title</th>
							<th>Meta Keyword</th>
							<th>Meta Description</th>
							<th>Status</th>
							<th>Published Date</th>
							<th>Slug</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($pages as $key=>$page)
						<tr>
							<td>  {{ ($pages->currentpage()-1) * $pages->perpage() + $key + 1 }}
							</td>
							<td>{{ $page->title }}</td>
							<!-- <td>@if($page->slider != 0){{ $page->slider }} @else {{ trans('No slider') }} @endif</td> -->
							<!-- <td><img src="{{ asset('/img/'. $page->featured_image) }}" height="100" width="100"></td> -->
							<td>{{ $page->meta_title }}</td>
							<td>{{ $page->meta_keyword }}</td>
							<td>{{ $page->meta_description }}</td>
							<td>@if($page->status !== ''){{ $page->status }}@else {{ trans('draft') }} @endif </td>
							<td>{{ $date = date('Y/m/d',strtotime($page->created_at)) }}</td>
							<td>{{ $page->slug }}</td>
							<td><a class="btn btn-info btn-sm" href="{{ route('page.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a> <a class="btn btn-danger btn-sm" href="{{ route('page.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No Page Added</td></tr></tbody>
				</table>
				@endif
			</div>
			{{ $pages->links() }}
		</div>
	</div>
</div>
@endsection