@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('events.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add new</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($newsEvents) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							
							<th>Order</th>
							<th>Event Date</th>
							<!-- <th>Order</th> -->
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
						@foreach ($newsEvents as $key=>$page)
						<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $page->title }}</td>
							<td>{{ $page->news_order }}</td>
							<td>{{ $page->e_date }}</td>
							
							<td><a class="btn btn-info btn-sm" href="{{ route('events.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('events.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php $k++; ?>
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No News &amp; Events Added</tr></td></tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection