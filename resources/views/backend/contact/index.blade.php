@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
			
				<a href="{{ route('contact.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add new</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			
			
			<div class="list">
				@if (count($contacts) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Office Name</th>
							<th>Address</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k = 1; ?>
						@foreach ($contacts as $key=>$contact)
						<tr>
							<td> {{ $k }}</td>
							<td>{{ $contact->title }}</td>
							<td>{{ $contact->office_name}}</td>
							<td>{{ $contact->address }}</td>
							<td>{{ $contact->phone }}</td>
							<td>{{ $contact->email }}</td>
							
							<td><a class="btn btn-info btn-sm" href="{{ route('contact.edit',['parameter' => $contact->id]) }}"><i class="fa fa-pencil"></i>
							 </a> <a class="btn btn-danger btn-sm" href="{{ route('contact.delete',['parameter' => $contact->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php $k++; ?>
						@endforeach
					</tbody>
				</table>
				@else
				<table>
					<tbody><tr><td>No Page Added</td></tr></tbody>
				</table>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection