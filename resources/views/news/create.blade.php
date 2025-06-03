@extends('admin_master')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add News</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add News</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add News</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
              	@csrf

                <input type="hidden" name="breaking_news" id="breaking_news" value="0">

                <div class="card-body">
                 

                 <div class="row">
                   <div class="col-md-12">
                      <div class="form-group">
                         <label for="title">News Title <span class="required">*</span></label>
                         <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{old('title')}}" required="">

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
                             <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                           <option value="{{$row->id}}">{{$row->name}}</option>
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
                   <textarea id="description" name="description"></textarea>
                   @error('description')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror
                 </div>

                 <div class="form-group">
                   <label for="image"> Image <span class="required">*</span></label>
                   <input name="image" type="file" id="image" class="dropify" data-height="200" required="" />

                   @error('image')
                     <span class="alert alert-danger">{{ $message }}</span>
                   @enderror

                 </div>

                 <div class="form-group">
                   <input type="checkbox" id="breaking_news_section" class="breaking_news">
                   <label for="breaking_news_section">Breaking News</label>


                 </div>

                 <div class="form-group">
                   <div class="form-inline">
                     <div class="form-group">
                       <input type="radio" name="status" id="Publish" value="Publish" checked="">
                       <label for="Publish">Publish</label>
                     </div>

                     <div class="form-group" style="margin-left: 10px;">
                       <input type="radio" name="status" id="Unpublish" value="Unpublish">
                       <label for="Unpublish">Unpublish</label>
                     </div>

                   </div>

                   @error('status')
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