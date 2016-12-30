@extends('admin.layout.app', ['title' =>'Testimonials Management', 'activeTestimonial' =>'active'])

@section('content')

<section class="content-header">
  <h1>
    Testimonials Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Testimonials Management</a></li>
  </ol>
</section>


<!-- Main content -->
    <section class="content">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lists of Testimonials</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Job Title</th>
                  <th>Order</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sn=1; ?>
                @foreach($testimonials as $testimonial)
                <tr>
                  <td>{{$sn++}}</td>
                  <td>{{$testimonial->name}}</td>
                  <td>{{$testimonial->job_title}}</td>
                  <td>{{$testimonial->testimonial_order}}</td>
                  <td>{{Carbon\Carbon::parse($testimonial->created_at)->format('Y/m/d')}}</td>
                  <td>{{Carbon\Carbon::parse($testimonial->updated_at)->format('Y/m/d')}}</td>
                  <td>
                 
                      <a  href="{{url('admin/testimonials/'.$testimonial->id.'/edit')}}" title="Edit Testimonial"><i class="margin-2 btn btn-info btn-xs glyphicon glyphicon-edit btn-with-icon"> Edit</i></a>
	                  {{Form::open(['url'=>'admin/testimonials/'.$testimonial->id, 'method'=>'DELETE' , 'id'=>'form-delete-'.$testimonial->id, 'style'=>'display:inline'])}}
	                  {{Form::close()}}
	                	<a  type ="submit" href="#" onclick="delTestimonial({{$testimonial->id}})" title="Delete Testimonial"><i class="margin-2 btn btn-danger btn-xs glyphicon glyphicon-trash btn-with-icon"> Delete</i></a>

	               </td>
                </tr>
                @endforeach
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
         </section>

         <script type="text/javascript">
         function delTestimonial(id){
         	if (confirm('Are you sure want to delete !!!')) {
         		document.getElementById("form-delete-"+id).submit();
         	}
         }
         </script>




@endsection