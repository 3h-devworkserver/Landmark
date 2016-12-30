@extends('admin.layout.app', ['title' =>'News And Events Management', 'activeNews' =>'active'])

@section('content')

<section class="content-header">
  <h1>
    News And Events Management
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">News And Events Management</a></li>
  </ol>
</section>


<!-- Main content -->
    <section class="content">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lists of News And Events</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Title</th>
                  <th>Short Description</th>
                  <th>Order</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $sn=1; ?>
                @foreach($newsEvents as $newsEvent)
                <tr>
                  <td>{{$sn++}}</td>
                  <td>{{$newsEvent->title}}</td>
                  <td>{{$newsEvent->summary}}</td>
                  <td>{{$newsEvent->news_order}}</td>
                  <td>{{Carbon\Carbon::parse($newsEvent->created_at)->format('Y/m/d')}}</td>
                  <td>{{Carbon\Carbon::parse($newsEvent->updated_at)->format('Y/m/d')}}</td>
                  <td>
                 
                      <a  href="{{url('admin/newsandevents/'.$newsEvent->id.'/edit')}}" title="Edit News and Event"><i class="margin-2 btn btn-info btn-xs glyphicon glyphicon-edit btn-with-icon"> Edit</i></a>
	                  {{Form::open(['url'=>'admin/newsandevents/'.$newsEvent->id, 'method'=>'DELETE' , 'id'=>'form-delete-'.$newsEvent->id, 'style'=>'display:inline'])}}
	                  {{Form::close()}}
	                	<a  type ="submit" href="#" onclick="delNewsEvent({{$newsEvent->id}})" title="Delete News and Event"><i class="margin-2 btn btn-danger btn-xs glyphicon glyphicon-trash btn-with-icon"> Delete</i></a>

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
         function delNewsEvent(id){
         	if (confirm('Are you sure want to delete !!!')) {
         		document.getElementById("form-delete-"+id).submit();
         	}
         }
         </script>




@endsection