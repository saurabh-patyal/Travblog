@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Permissions
        <small>Creating Role permissions</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Role Permissions</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('permission.store')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> permission </label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission name">
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