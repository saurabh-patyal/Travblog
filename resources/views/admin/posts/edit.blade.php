@extends('admin.layouts.admin_layout')
@section('page-css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit your Post
        <small>Edit Post with styles</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Edit Post Like Fun</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              {{method_field('PATCH')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="title"> Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                <label>Select mutiple categories for Your Post</label>
                <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select multiple categories"
                        style="width: 100%;">
                       @foreach($categories as $category)
                  <option value="{{$category->id}}"

                      @foreach($post->categories as $postcategory)
                        @if($postcategory->id == $category->id)
                          selected
                        @endif
                      @endforeach
                  >{{$category->name}}</option>
                  @endforeach
                
                </select>
                  
                </select>
              </div>


                <div class="form-group">
                  <label for="subtitle"> Post Sub Title</label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Post SubTitle" value="{{$post->subtitle}}">
                </div>
                <div class="form-group">
                <label>Select mutiple tags for Your Post</label>
                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select multiple tags"
                        style="width: 100%;">
                        @foreach($tags as $tag)
                  <option value="{{$tag->id}}"

                      @foreach($post->tags as $posttag)
                        @if($posttag->id == $tag->id)
                          selected
                        @endif
                      @endforeach
                  >{{$tag->name}}</option>
                  @endforeach
                
                </select>
              </div>
                 <div class="form-group">
                  <label for="slug"> Post Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post slug" value="{{$post->slug}}">
                </div>
                 <div class="form-group">
                  <label for="post-img">File input</label>
                  <input type="file" name="image" id="img">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" checked> Publish
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Publish</button>
              </div>
               <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Write Post Body here
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea class="textarea" placeholder="Place some text here" name="body" 
                          style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->body}}</textarea>
              
            </div>


            </form>
          </div>
         
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection
@section('page-js')
<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  

  });
    </script>
@endsection