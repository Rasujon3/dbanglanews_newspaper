@extends('admin_master')
@section('content')
 
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Subcategory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">All Subcategory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Subcategory</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <a href="{{route('subcategories.create')}}" class="btn btn-primary add-new">Add New</a><br><br>
              	

                <div class="card">
                  <div class="card-body">

                     <div class="row">
                       <div class="col-md-6">
                         <div class="form-group">
                            <label for="category_id">Select category</label>
                            <select class="form-control select2bs4" id="category_id">
                               <option value="" selected="" disabled="">Select category</option>
                               @foreach(categories() as $category)
                                 <option value="{{$category->id}}">{{$category->category_name}}</option>
                               @endforeach
                            </select>
                         </div>
                       </div>

                       <div class="col-md-6">
                         <div class="form-group">
                            <label for="filter-status"><strong>Filter by status :</strong></label>
                            <select id="filter-status" class="form-control select2bs4">
                                <option value="" disabled="" selected="">Select Status</option>
                                <option value="Publish">Publish</option>
                                <option value="Unpublish">Unpublish</option>
                            </select>
                           </div>
                       </div>

                       <div class="col-md-12">
                         <div class="form-group">
                            <button type="button" class="btn btn-primary btn-block filter-subcategory"><i class="fa fa-search"></i> Search</button>
                         </div>
                       </div>

                     </div>

                      
                  </div>
              </div>

              	<div class="fetch-data table-responsive">
              	  <table class="table table-bordered table-striped vendor-table data-table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Subcategory Name</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="conts">
                  
                  </tbody>


              	</div>
                

              </div>
              
            </div>
    </section>
 </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<script type="text/javascript">
  $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        stateSave: true,
        ajax: {
          url: "{{ url('subcategories') }}",
          data: function (d) {
                d.status = $('#filter-status').val(),
                d.category_id = $('#category_id').val(),
                d.search = $('.dataTables_filter input').val()
            }
        },

        columns: [
            {data: 'subcategory_name', name: 'subcategory_name'},
            {data: 'category_name', name: 'category_name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]


    });
    

    $('.filter-subcategory').click(function(e){
        e.preventDefault();
        table.draw(); 
    });


  });
</script>

@endsection