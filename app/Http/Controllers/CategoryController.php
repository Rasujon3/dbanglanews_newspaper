<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth_check');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try
        {
           if($request->ajax()) {
                $data = Category::latest()->select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('status', function($row){
                            if($row->status == 'Publish')
                            {
                                return "<span class='badge badge-success status'>Publish</span>";
                            }
                            else
                            {
                                return "<span class='badge badge-danger status'>Unpublish</span>";
                            }
                        })
                        ->addColumn('action', function($row){

                                                         
                            $btn = "";
                            $btn .= '&nbsp;';

                            if($row->status == 'Publish')
                            {
                                $btn .= ' <a href="#" class="btn btn-danger btn-sm decline-category action-button" data-id="'.$row->id.'"><i class="fa fa-ban"></i></a>';
                            }
                            else
                            {
                                $btn .= ' <a href="#" class="btn btn-primary btn-sm active-category action-button" data-id="'.$row->id.'"><i class="fa fa-check" aria-hidden="true"></i></a>';
                            }

                            $btn .= '&nbsp;';


                            $btn .= ' <a href="'.route('categories.show',$row->id).'" class="btn btn-primary btn-sm action-button"><i class="fa fa-edit"></i></a>';

                            $btn .= '&nbsp;';


                              $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-category action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
        
                                return $btn;
                        })
                        ->rawColumns(['action', 'status'])
                        ->make(true); 
            }
            
            return view('categories.index'); 
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try
        {
           return view('categories.create');
             
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try
        {
            if($request->file('category_image'))
            {   
                $file = $request->file('category_image');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/categories/', $name); 
                $path = 'public/uploads/categories/'.$name;
            }

            $category = new Category();
            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->category_image = $path;
            $category->save();
            $notification=array(
                             'messege'=>"Successfully category has been added",
                             'alert-type'=>'success'
                            );

            return Redirect()->back()->with($notification);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        try
        {
           return view('categories.edit', compact('category')); 
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try
        {
           if($request->file('category_image'))
            {   
                $file = $request->file('category_image');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/categories/', $name); 
                $path = 'public/uploads/categories/'.$name;
                unlink($category->category_image);
            }
            else
            {
                $path = $category->category_image;
            }

            $category->category_name = $request->category_name;
            $category->status = $request->status;
            $category->category_image = $path;
            $category->update();
            $notification=array(
                             'messege'=>"Successfully category has been updated",
                             'alert-type'=>'success'
                            );

            return Redirect()->back()->with($notification);
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try
        {    

            unlink($category->category_image);
            $category->delete();
            return response()->json('Successfully category has been deleted');

        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
