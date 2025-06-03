@extends('admin_master')
@section('content')
 
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    	<div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <a href="{{route('users.create')}}" class="btn btn-primary add-new">Add New User</a><br><br>
              	

              	<div class="fetch-data table-responsive">
              	  <table class="table table-bordered table-striped vendor-table data-table" style="width: 100%;" id="category-table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Email</th>
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
          url: "{{ url('users') }}",
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'role', name: 'role'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]


    });



  });
</script>

@endsection