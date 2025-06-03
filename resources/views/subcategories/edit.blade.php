@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Subcategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Subcategory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Subcategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('subcategories.update',$subcategory->id)}}" method="POST" enctype="multipart/form-data">
              	@csrf
                @method('PATCH')
                <div class="card-body">
                 <div class="form-group">
                   <label for="subcategory_name">Subcategory Name <span class="required">*</span></label>
                   <input type="text" name="subcategory_name" class="form-control" id="subcategory_name" placeholder="Subcategory Name" value="{{old('subcategory_name', $subcategory->subcategory_name)}}" required="">
                   @error('subcategory_name')
		                 <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="form-group">
                   <label for="category_id">Select Category <span class="required">*</span></label>
                   <select class="form-control select2bs4" name="category_id" id="category_id">
                      <option value="" selected="" disabled="">Select category</option>
                      @foreach(categories() as $category)
                        <option value="{{$category->id}}" <?php if($subcategory->category_id == $category->id){echo "selected";} ?>>{{$category->category_name}}</option>
                      @endforeach
                   </select>

                   @error('category_id')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                   
                 </div>

                 <div class="form-group">
                   <label for="subcategory_image">Subcategory Image <span class="required">*</span></label>
                   <input name="subcategory_image" type="file" id="subcategory_image" class="dropify" data-height="200" data-default-file="{{URL::to($subcategory->subcategory_image)}}"  />

                   @error('subcategory_image')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="form-group">
                   <div class="form-inline">
                     <div class="form-group">
                       <input type="radio" name="status" id="Publish" value="Publish" <?php if($subcategory->status == 'Publish'){echo "checked";} ?>>
                       <label for="Publish">Publish</label>
                     </div>

                     <div class="form-group" style="margin-left: 10px;">
                       <input type="radio" name="status" id="Unpublish" value="Unpublish" <?php if($subcategory->status == 'Unpublish'){echo "checked";} ?>>
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