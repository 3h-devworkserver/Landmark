@extends('layouts.app')
@section('htmlheader_title')
Country Accordion List
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('admin.country.block.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add Country Block</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($countries) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Identifier</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
						@foreach ($countries as $key=>$page)
						<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $page->title }}</td>
							<td>{{ $page->identifier }}</td>
							<td><a class="btn btn-info btn-sm" href="{{ route('admin.country.block.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('admin.country.block.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php $k++; ?>
						@endforeach
					</tbody>
				</table>
				@else
					<div class="box box-danger">
				        <div class="box-header with-border">
				          <h3 class="box-title">Information</h3>
				          <span class="label label-danger pull-right"><i class="fa fa-eye"></i></span>
				        </div><!-- /.box-header -->
				        <div class="box-body">
				          <p>No country accordion added
				          </p>
				        </div><!-- /.box-body -->
      				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection