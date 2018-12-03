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
        Create New User
        <small>Creating User</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">

              <h3 class="box-title">Create User</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="title"> User Name</label>
                  <input type="text" class="form-control" id="title" name="name" placeholder="Enter User Name" value="{{old('name')}}">
                </div>
                

                <div class="form-group">
                  <label for="subtitle"> User Email</label>
                  <input type="text" class="form-control" id="subtitle" name="email" placeholder="Enter Email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                  <label for="role"> Assign Role</label>
                  <div class="row">
                    @foreach ($roles as $role)
                      <div class="col-lg-3">
                        
                        <div class="checkbox">
                          <label>
                          <input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}
                          </label>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
                <div class="form-group">
                  <label for="subtitle"> User Password</label>
                  <input type="password" class="form-control" id="subtitle" name="password" placeholder="Enter User password">
                </div>
                <div class="form-group">
                  <label for="subtitle"> confirm Password</label>
                  <input type="password" class="form-control" id="subtitle" name="password_confirmation" placeholder="Enter confirm password">
                </div>
                <div class="form-group">
                  <label for="status"> Status</label>
                  <div class="checkbox">
                          <label>
                          <input type="checkbox" name="status" value="1">Status
                          </label>
                        </div>
                </div>

                

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </form>
         
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