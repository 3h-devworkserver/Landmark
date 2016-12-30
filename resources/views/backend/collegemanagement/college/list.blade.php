@extends('layouts.app')
@section('htmlheader_title')
College List
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('admin.college.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add College</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($college) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>Institution Type</th>
							<th>Contact</th>
							<th>Url</th>
							<th>location</th>
							<th>course</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
						@foreach ($college as $key=>$page)
						<?php 
						$university = DB::table('universities')->where('u_id',$page->uni_id)->first();
						$location = DB::table('locations')->where('id',$page->location)->first();
						$courses = DB::table('course_details')->where('college_id',$page->collegeid)->get();
						$count = count($courses);
						?>
						<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $page->college_name }}</td>
							<td>{{ $university->university_name }}</td>
							<td>{{ $page->contact }}</td>
							<td>{{ $page->url }}</td>
							<td>{{ $location->name }}</td>
							<td>
								@foreach($courses as $key => $course)
							 		{{ $course->course_name }} <?php if($key < $count -1 ){ echo ',';} ?>
								@endforeach
							</td>
							<td><a class="btn btn-info btn-sm" href="{{ route('admin.college.edit',['parameter' => $page->collegeid]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('admin.college.delete',['parameter' => $page->collegeid]) }}"><i class="fa fa-trash-o"></i></a></td>
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
				          <p>No any college info
				          </p>
				        </div><!-- /.box-body -->
      				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection