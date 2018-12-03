@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Permissions
        <small>Edit Role Permission</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Role permission</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('permission.update',$permission->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="permission"> Permission name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission name" value="{{$permission->name}}">
                </div>
                <div class="form-group">
                  <label for="for" > permission for</label>
                  <select name="for" class="form-control">
                    
                    <option selected disabled> Select Permission for </option>
                    <option value="user">User</option>
                    <option value="post">Post</option>
                    <option value="other">Other</option>

                  </select>
                </div>

                 

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
              </div>
              <!-- /.box-body -->

   


    @endsection