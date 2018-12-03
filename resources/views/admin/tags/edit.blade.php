@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Tags
        <small>Edit Post Tags</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Post Tags</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('tags.update',$tag->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> Post tag</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Post Tag name" value="{{$tag->name}}">
                </div>

                 <div class="form-group">
                  <label for="slug"> Tag Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post Tag slug" value="{{$tag->slug}}">
                </div>

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
              </div>
              <!-- /.box-body -->

   


    @endsection