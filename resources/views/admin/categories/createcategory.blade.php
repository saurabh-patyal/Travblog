@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Post Category
        <small>Post Category</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Post Category</h3>
            </div>
            @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('category.store')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> Post Category</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category name">
                </div>

                 <div class="form-group">
                  <label for="slug"> Category Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post Category slug">
                </div>

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
              </div>
              <!-- /.box-body -->

   


    @endsection