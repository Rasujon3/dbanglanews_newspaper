$(document).ready(function(){

	$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

	$('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

   
    var getUrl = window.location;
	  if(getUrl.pathname.split('/').length > 2)
	  {
	    var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
	  }
	  else
	  {
	      var base_url = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
	  }

    
     
     var currentURL = window.location.pathname;

     var ajax_url = '';


  
  $(document).on('click', '.decline-category', function(e){
      e.preventDefault();
      var int_category_id = $(this).data('id');
      ajax_url = base_url+"decline-category/"+int_category_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
            
  });

  $(document).on('click', '.active-category', function(e){
      e.preventDefault();
      var int_category_id = $(this).data('id');
      if(confirm('Do you want to change the status?'))
      {
          ajax_url = base_url+"active-category/"+int_category_id;
            $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
      
  });





  $(document).on('click', '.delete-category', function(e){
       e.preventDefault();
       var category_id = $(this).data('id');
       if(confirm('Do you want to delete this?'))
       {
          ajax_url = base_url+"categories/"+category_id;
            $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
  });
 
  
  $(document).on('click', '.decline-subcategory', function(e){
      e.preventDefault();
      var subcategory_id = $(this).data('id');
      ajax_url = base_url+"decline-subcategory/"+subcategory_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
  });


  $(document).on('click', '.active-subcategory', function(e){
      e.preventDefault();
      var subcategory_id = $(this).data('id');
      ajax_url = base_url+"active-subcategory/"+subcategory_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
  });

  

  $(document).on('click', '.delete-subcategory', function(e){
       e.preventDefault();
       var subcategory_id = $(this).data('id');
       if(confirm('Do you want to delete this?'))
       {
          ajax_url = base_url+"subcategories/"+subcategory_id;
            $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
  });

 
 $(document).on('click', '.decline-specialcategory', function(e){
         e.preventDefault();
         var specialcategory_id = $(this).data('id');
        ajax_url = base_url+"decline-specialcategory/"+specialcategory_id;
        if(confirm('Do you want to change the status?'))
        {
            $.ajax({

                   url: ajax_url,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                      toastr.success(data);

                       $('.data-table').DataTable().ajax.reload(null, false);
       
                   },
                          
              });
        }
  });


 $(document).on('click', '.active-specialcategory', function(e){
         e.preventDefault();
         var specialcategory_id = $(this).data('id');
        ajax_url = base_url+"active-specialcategory/"+specialcategory_id;
        if(confirm('Do you want to change the status?'))
        {
            $.ajax({

                   url: ajax_url,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                      toastr.success(data);

                       $('.data-table').DataTable().ajax.reload(null, false);
       
                   },
                          
              });
        }
  });

 $(document).on('click', '.delete-specialcategory', function(e){
       e.preventDefault();
       var specialcategory_id = $(this).data('id');
       if(confirm('Do you want to delete this?'))
       {
          ajax_url = base_url+"specialcategories/"+specialcategory_id;
            $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
  });

 $(document).on('change', '#category_id', function(){
      var category_id = $(this).val();
      ajax_url = base_url+"get-subcategories/"+category_id;
        $.ajax({

             url: ajax_url,
             type:"GET",
             dataType:"html",
             success:function(data) {
                $('#subcategory_id').html(data);
 
             },
                    
        });
 });

 $(document).on('click', '#breaking_news_section', function(e){
    if($("#breaking_news_section").prop('checked') == true){
        $('#breaking_news').val(1);
    }
    else
    {
      $('#breaking_news').val(0);
    }
 });

 $(document).on('click', '.active-news', function(e){
    e.preventDefault();
      var news_id = $(this).data('id');
      ajax_url = base_url+"active-news/"+news_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
 });


 $(document).on('click', '.decline-news', function(e){
    e.preventDefault();
      var news_id = $(this).data('id');
      ajax_url = base_url+"decline-news/"+news_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
 });

 
 $(document).on('click', '.delete-news', function(e){
  e.preventDefault();
   var int_news_id = $(this).data('id');
   ajax_url = base_url+"news/"+int_news_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
 });

 $(document).on('click', '.delete-role', function(e){
    e.preventDefault();
    var role_id = $(this).data('id');
    ajax_url = base_url+"roles/"+role_id;
      if(confirm('Do you want to delete this role?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
});


$(document).on('click', '.delete-user', function(e){
    e.preventDefault();
    var user_id = $(this).data('id');
      ajax_url = base_url+"users/"+user_id;
      if(confirm('Do you want to delete this user?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"DELETE",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }                                                  
});


$(document).on('click', '.active-user', function(e){
    e.preventDefault();
      var user_id = $(this).data('id');
      ajax_url = base_url+"active-user/"+user_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
 });


 $(document).on('click', '.decline-user', function(e){
    e.preventDefault();
      var user_id = $(this).data('id');
      ajax_url = base_url+"decline-user/"+user_id;
      if(confirm('Do you want to change the status?'))
      {
          $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
      }
 });



$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });



});




