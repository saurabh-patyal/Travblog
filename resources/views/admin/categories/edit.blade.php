@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Post Category
        <small>Edit Category</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Post Category</h3>
            </div>
            @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('category.update',$category->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> Post Category</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category name" value="{{$category->name}}">
                </div>

                 <div class="form-group">
                  <label for="slug"> Category Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post Category slug" value="{{$category->slug}}">
                </div>

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
              </div>
              <!-- /.box-body -->

   


    @endsection