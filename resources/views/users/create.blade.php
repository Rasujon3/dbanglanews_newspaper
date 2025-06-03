@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">

                 <div class="form-group">
                   <label for="name">Name<span class="required">*</span></label>
                   <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{old('name')}}" required="">
                   @error('name')
		                 <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="form-group">
                   <label for="role_id">Select Role<span class="required">*</span></label>
                   <select class="form-control select2bs4" name="role_id" id="role_id" required="">
                     <option value="" selected="" disabled="">Select Role</option>
                     @foreach(roles() as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                   </select>
                   @error('role_id')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>
                 

                 <div class="form-group">
                   <label for="email">Email<span class="required">*</span></label>
                   <input type="email" name="email" class="form-control" id="email" placeholder="Name" value="{{old('email')}}" required="">
                   @error('email')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>





                 <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
    </section>
 </div>
@endsection