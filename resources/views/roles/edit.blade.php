@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Role</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Role</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('roles.update',$role->id)}}" method="POST" enctype="multipart/form-data">
              	@csrf
                @method('PATCH')

                <div class="card-body">
                 <div class="form-group">
                   <label for="name">Role Name <span class="required">*</span></label>
                   <input type="text" name="name" class="form-control" id="name" placeholder="Role Name" value="{{old('name', $role->name)}}" required="">
                   @error('name')
		                 <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>


                 <div class="card"> 
                   <div class="card-header">
                     <h5>Edit Authorization</h5>
                   </div>

                   <div class="card-body">
                     <div class="row">
                       <div class="col-md-3">
                         <input type="checkbox" name="category" id="category" value="1" <?php if(fieldDetails($role->id)->category == 1){echo "checked";} ?>>
                         <label for="category">Category</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="subcategory" id="subcategory" value="1" <?php if(fieldDetails($role->id)->subcategory == 1){echo "checked";} ?>>
                         <label for="subcategory">Subcategory</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="news" id="news" value="1" <?php if(fieldDetails($role->id)->news == 1){echo "checked";} ?>>
                         <label for="news">News</label>
                       </div>

                       <div class="col-md-3">
                         <input type="checkbox" name="get_role" id="get_role" value="1" <?php if(fieldDetails($role->id)->get_role == 1){echo "checked";} ?>>
                         <label for="get_role">Role</label>
                       </div>

                     </div>
                   </div>

                 </div>


                 <div class="form-group">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
                  
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
    </section>
 </div>
@endsection