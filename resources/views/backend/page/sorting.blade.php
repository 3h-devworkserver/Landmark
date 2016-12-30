@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10">
			<div class="row">
				<div class="col-sm-6 col-md-6">
				<ul class="list-unstyled list-inline">
					<li><a href="{{ route('page.sorting',['parameter' => 'all']) }}">All</a> ( {{ $all }} ) | </li>
					<li><a href="{{ route('page.sorting',['parameter' => 'publish']) }}">Published</a> ( {{ $publish }} ) |</li>
					<li><a href="{{ route('page.sorting',['parameter' => 'draft']) }}">Draft</a> ( {{ $draft }} )</li>
				</ul>
				</div>
				<div class="col-md-6 col-md-6">
					<a href="{{ url('page/new') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>

				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12">{{ ucfirst($id) }} pages</div>
			</div> -->
			<div class="list">
				@if (count($pages) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Slider</th>
							<!-- <th>Featured Image</th> -->
							<th>Meta Title</th>
							<th>Meta Keyword</th>
							<th>Meta Description</th>
							<th>Status</th>
							<th>Published Date</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($pages as $key=>$page)
						<tr>
							<td>  {{ ($pages->currentpage()-1) * $pages->perpage() + $key + 1 }}
							</td>
							<td>{{ $page->title }}</td>
							<td>@if($page->slider == 1) {{ trans('enable') }} @else {{ trans('disable') }} @endif</td>
							<!-- <td><img src="{{ asset('/img/'. $page->featured_image) }}" height="100" width="100"></td> -->
							<td>{{ $page->meta_title }}</td>
							<td>{{ $page->meta_keyword }}</td>
							<td>{{ $page->meta_description }}</td>
							<td>@if($page->status !== ''){{ $page->status }}@else {{ trans('draft') }} @endif </td>
							<td>{{ $date = date('Y/m/d',strtotime($page->created_at)) }}</td>
							<td><a href="{{ route('page.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a> | <a href="{{ route('page.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
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
			{{ $pages->links() }}
		</div>
	</div>
</div>
@endsection