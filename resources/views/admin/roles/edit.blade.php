@extends('admin.layouts.admin_layout')


@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Roles
        <small>Edit Post Roles</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

       </div>
       <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Post Roles</h3>
            </div>
           @include('admin.messages')
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('role.update',$roles->id)}}" method="post">
              {{csrf_field()}}
              {{method_field('PATCH')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="tag"> Role name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Post Tag name" value="{{$roles->name}}">
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
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}"
                       @foreach ($roles->permissions as $role_permit)
                         @if ($role_permit->id==$permission->id)
                         checked
                           
                         @endif
                       @endforeach>{{$permission->name}}
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
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}"@foreach ($roles->permissions as $role_permit)
                         @if ($role_permit->id==$permission->id)
                         checked
                           
                         @endif
                       @endforeach>{{$permission->name}}
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
                       <input type="checkbox" name="permission[]" value="{{$permission->id}}"
                       @foreach ($roles->permissions as $role_permit)
                         @if ($role_permit->id==$permission->id)
                         checked
                           
                         @endif
                       @endforeach>{{$permission->name}}
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