@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Role
        <small>Creating Post Role</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create User Role</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('role.store')}}" method="post">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> Role name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Post Tag name">
                </div>
                <div class="col-lg-12 content-header text-center">
                  <label>Assign Multiple Permissions</label></div>
                </div>
                </div>
                
                 <div class="col-lg-4">
                   <label>Posts Permission</label>
                   @foreach ($permissions as $permission)
                     @if ($permission->for=='post')
                       <div class="checkbox">
                     <label>
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                     </label>
                   </div>
                     @endif
                   @endforeach
                  </div>

                 
                 <div class="col-lg-4">
                   <label>User Permission</label>
                   @foreach ($permissions as $permission)
                     @if ($permission->for=='user')
                       <div class="checkbox">
                     <label>
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                     </label>
                   </div>
                     @endif
                   @endforeach
                 </div>
                 <div class="col-lg-4">
                   <label>Other Permission</label>
                   @foreach ($permissions as $permission)
                     @if ($permission->for=='other')
                       <div class="checkbox">
                     <label>
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                     </label>
                   </div>
                     @endif
                   @endforeach
                 </div>
                   

                 </div>
                 

               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
      </form>
              </div>
              <!-- /.box-body -->

   


    @endsection