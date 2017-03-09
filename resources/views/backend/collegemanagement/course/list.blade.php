@extends('layouts.app')
@section('htmlheader_title')
Courses List
@endsection
@section('main-content')
<div class="spark-screen">
	<div class="row page-status-bar">
				<div class="col-md-12">
				<a href="{{ route('admin.course.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add Courses</a>
				</div>
	
			</div>
	<div class="row">
		<div class="col-md-12">
			
			<div class="list">
				@if (count($courses) > 0)
				<table class="table table-bordered table-striped" id="example" width="100%">
					<thead>
						<tr>
							<th>S.N.</th>
							<th>Title</th>
							<th>College</th>
							<th>Course Level</th>
							<th>IELTS</th>
							<th>Scholarship</th>
							<th>Tuition Fee</th>
							<th>Action</th>
						</tr>
					</thead>
					
					
					<tbody>
						<?php $k =1; ?>
						@foreach ($courses as $key=>$page)
						<?php 
						$ids = explode(',', $page->college_id);
						$count = count($ids);
						$level = DB::table('course_level')->where('id',$page->level_id)->first();
							?>
						<tr>
							<td>  {{ $k }}
							</td>
							<td>{{ $page->course_name }}</td>
							<td>
							@if($ids)	
								@foreach($ids as $key => $id)
							 	<?php $college = DB::table('college_details')->where('collegeid',$id)->first(); ?>
							 		{{ $college->college_name }} <?php if($key < $count -1 ){ echo ',';} ?>
								@endforeach
							@endif
							</td>
							<td>@if(!empty( $level->title )) {{ $level->title }} @endif</td>
							<td>@if(!empty( $page->ielts )) {{ $page->ielts }} @endif</td>
							<td>@if(!empty( $page->scholarship )) {{ $page->scholarship }} @endif</td>
							<td>@if(!empty( $page->tuitionfee )) {{ $page->tuitionfee }} @endif</td>
							<td><a class="btn btn-info btn-sm" href="{{ route('admin.course.edit',['parameter' => $page->id]) }}"><i class="fa fa-pencil"></i> </a>
								<a class="btn btn-danger btn-sm" href="{{ route('admin.course.delete',['parameter' => $page->id]) }}"><i class="fa fa-trash-o"></i></a></td>
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
				          <p>No any course info
				          </p>
				        </div><!-- /.box-body -->
      				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection