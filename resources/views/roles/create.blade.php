@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Role</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
              	@csrf
                <div class="card-body">
                 <div class="form-group">
                   <label for="name">Role Name <span class="required">*</span></label>
                   <input type="text" name="name" class="form-control" id="name" placeholder="Role Name" value="{{old('name')}}" required="">
                   @error('name')
		                 <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="card">
                   <div class="card-header">
                     <h5>Add Authorization</h5>
                   </div>

                   <div class="card-body">
                     <div class="row">
                       <div class="col-md-3">
                         <input type="checkbox" name="category" id="category" value="1">
                         <label for="category">Category</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="subcategory" id="subcategory" value="1">
                         <label for="subcategory">Subcategory</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="news" id="news" value="1">
                         <label for="news">News</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="role" id="role" value="1">
                         <label for="role">Role</label>
                       </div>

                     </div>
                   </div>

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