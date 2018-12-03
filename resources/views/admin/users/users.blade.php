@extends('admin.layouts.admin_layout')
@section('page-css')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        users
        <small>Below are Total users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">users</a></li>
        <li class="active">Below are Total users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               @include("admin.messages")
              <a class="btn btn-primary pull-right" href="{{route('users.create')}}">Add new user</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>user Name</th>
                  <th>Assined Roles</th>
                  <th>user email</th>
                  <th>Status</th>
                  <th>createdDate</th>
                  <th>Last updated</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)

                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$user->name}}</td>
                  <td>
                    @foreach ($user->roles as $role)
                      {{$role->name}},
                  @endforeach
                </td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->status?'Active':'Deactive'}}</td>
                  <td>{{$user->created_at }}</td>
                  <td>{{$user->updated_at }}</td>
                  <td><a href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit"></i></a></td>

                  <form  action="{{route('users.destroy',$user->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                  <td><input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to Remove?');"></td>

                  </form>
                </tr>
                
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>user Name</th>
                  <th>Assigned Roles</th>
                  <th>user email</th>
                  <th>Status</th>
                  <th>Created Date</th>
                  <th>Updated Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

 

@endsection

@section('page-js')
<!-- DataTables -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection