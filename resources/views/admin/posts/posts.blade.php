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
        All Posts
        <small>Below are All Posts</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              @include('admin.messages')
              <a class="btn btn-primary pull-right" href="{{route('posts.create')}}">Add new Post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Post Title</th>
                  <th>Subtitle</th>
                  <th>Slug</th>
                  <th>image</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>{{$post->subtitle}}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{$post->image}}</td>
                  
                  <td><a href="{{route('posts.edit',$post->id)}}"><i class="fa fa-edit"></i></a></td>
                 
                  <form  action="{{route('posts.destroy',$post->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                 <td> <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to Remove?');"></td>
                </form>

                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Post Title</th>
                  <th>Subtitle</th>
                  <th>Slug</th>
                  <th>image</th>
                 
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