@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add new</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($testimonials) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Name</th>
							<th>Position</th>
							<th>Company</th>
							<th>Address</th>
							<th>Order</th>
							<!-- <th>Order</th> -->
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($testimonials as $key=>$page)
						<tr>
							<td>  {{ ($testimonials->currentpage()-1) * $testimonials->perpage() + $key + 1 }}
							</td>
							<td>{{ $page->name }}</td>
							<td>{{ $page->job_title }}</td>
							<td>{{ $page->company }}</td>
							<td>{{ $page->address }}</td>
							<!-- <td><img src="{{ asset('/img/'. $page->featured_image) }}" height="100" width="100"></td> -->
							<td>{{ $page->testimonial_order }}</td>
							<!-- <td>{{ $page->ordering }}</td> -->
							<td><a class="btn btn-info btn-sm" href="{{ route('testimonials.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('testimonials.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No Testimonial Added</tr></td></tbody>
				</table>
				@endif
			</div>
			{{ $testimonials->links() }}
		</div>
	</div>
</div>
@endsection