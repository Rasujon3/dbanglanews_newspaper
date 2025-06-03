@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit News</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update News</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('news.update',$news->id)}}" method="POST" enctype="multipart/form-data">
              	@csrf
              	@method('PATCH')

                <input type="hidden" name="breaking_news" id="breaking_news" value="{{$news->breaking_news}}">

                <div class="card-body">
                 

                 <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                         <label for="title">News Title <span class="required">*</span></label>
                         <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{old('title',$news->title)}}" required="">

                         @error('title')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                      </div>
                   </div>


                   <div class="col-md-4">
                     <div class="form-group">
                        <label for="category_id">Select Category <span class="required">*</span></label>
                        <select class="form-control select2bs4" name="category_id" id="category_id" required="">
                          <option value="" selected="" disabled="">Select Category</option>
                           @foreach(categories() as $category)
                             <option value="{{$category->id}}" <?php if($category->id == $news->category_id){echo "selected";} ?>>{{$category->category_name}}</option>
                           @endforeach
                        </select>

                        @error('category_id')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                     </div>
                   </div> 


                   <div class="col-md-4">
                     <div class="form-group">
                        <label for="subcategory_id">Select Subcategory</label>
                        <select class="form-control select2bs4" name="subcategory_id" id="subcategory_id">
                          <option value="" selected="" disabled="">Select Subcategory</option>
                          @foreach(subcategories() as $subcategory)
                           <option value="{{$subcategory->id}}" <?php if($subcategory->id == $news->subcategory_id){echo "selected";} ?>>{{$subcategory->subcategory_name}}</option>
                          @endforeach
                        </select>

                        @error('subcategory_id')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                     </div>
                   </div>

                   <div class="col-md-4">
                   	<div class="form-group">
                   <label for="specialcategory_id">Select Special Category</label>
                   <select class="form-control select2bs4" name="specialcategory_id" id="specialcategory_id">
                     <option value="" selected="" disabled="">Select Special Category</option>
                     @foreach(specialcategories() as $row)
                       <option value="{{$row->id}}" <?php if($row->id == $news->specialcategory_id){echo "selected";} ?>>{{$row->name}}</option>
                     @endforeach
                   </select>

                   @error('specialcategory_id')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                 </div>
                   </div>

                 </div>

                 


                 <div class="form-group">
                   <label for="description">Description <span class="required">*</span></label>
                   <textarea id="description" name="description">{{$news->description}}</textarea>
                   @error('description')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="form-group">
                   <label for="image"> Image <span class="required">*</span></label>
                   <input name="image" type="file" id="image" class="dropify" data-height="200" data-default-file="{{URL::to($news->image)}}" />

                   @error('image')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                 </div> 

                 <div class="form-group">
                   <input type="checkbox" id="breaking_news_section" class="breaking_news" <?php if($news->breaking_news == 1){echo "checked";} ?>>
                   <label for="breaking_news_section">Breaking News</label>

                   
                 </div>

                 <div class="form-group">
                   <div class="form-inline">
                     <div class="form-group">
                       <input type="radio" name="status" id="Publish" value="Publish" <?php if($news->status == 'Publish'){echo "checked";} ?>>
                       <label for="Publish">Publish</label>
                     </div>

                     <div class="form-group" style="margin-left: 10px;">
                       <input type="radio" name="status" id="Unpublish" value="Unpublish" <?php if($news->status == 'Unpublish'){echo "checked";} ?>>
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