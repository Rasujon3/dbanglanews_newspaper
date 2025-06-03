@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                 <div class="form-group">
                   <label for="category_name">Category Name <span class="required">*</span></label>
                   <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name" value="{{old('category_name', $category->category_name)}}" required="">
                   @error('category_name')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="form-group">
                   <label for="category_image">Category Image <span class="required">*</span></label>
                   <input name="category_image" type="file" id="category_image" class="dropify" data-height="200" data-default-file="{{URL::to($category->category_image)}}"/>


                 </div>

                 <div class="form-group">
                   <div class="form-inline">
                     <div class="form-group">
                       <input type="radio" name="status" id="Publish" value="Publish" <?php if($category->status == 'Publish'){echo "checked";} ?>>
                       <label for="Publish">Publish</label>
                     </div>

                     <div class="form-group" style="margin-left: 10px;">
                       <input type="radio" name="status" id="Unpublish" value="Unpublish" <?php if($category->status == 'Unpublish'){echo "checked";} ?>>
                       <label for="Unpublish">Unpublish</label>
                     </div>

                   </div>

                   @error('status')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
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