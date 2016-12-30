@extends('layouts.app')
@section('htmlheader_title')
Post
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('post.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add Post</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($posts) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							
							<th>Url</th>
							<th>Categories</th>
							<th>Order</th>
							<!-- <th>Order</th> -->
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
						@foreach ($posts as $key=>$page)
						<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $page->title }}</td>
							<td>{{ $page->url }}</td>
							<td>{{ $page->cat }}</td>
							<td>{{ $page->post_order }}</td>
							
							<td><a class="btn btn-info btn-sm" href="{{ route('post.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('post.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php $k++; ?>
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No Post Added</tr></td></tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection