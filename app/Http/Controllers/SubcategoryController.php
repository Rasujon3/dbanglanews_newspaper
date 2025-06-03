<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth_check');
    }
    
    public function index(Request $request)
    {
        try
        {
           if($request->ajax()) {
                $data = Subcategory::join('categories', 'subcategories.category_id', 'categories.id')->orderBy('subcategories.id','DESC')->select('subcategories.id', 'subcategories.subcategory_name', 'subcategories.status', 'categories.category_name');
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
                                $btn .= ' <a href="#" class="btn btn-danger btn-sm decline-subcategory action-button" data-id="'.$row->id.'"><i class="fa fa-ban"></i></a>';
                            }
                            else
                            {
                                $btn .= ' <a href="#" class="btn btn-primary btn-sm active-subcategory action-button" data-id="'.$row->id.'"><i class="fa fa-check" aria-hidden="true"></i></a>';
                            }

                            $btn .= '&nbsp;';


                            $btn .= ' <a href="'.route('subcategories.show',$row->id).'" class="btn btn-primary btn-sm action-button"><i class="fa fa-edit"></i></a>';

                            $btn .= '&nbsp;';


                              $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-subcategory action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
        
                                return $btn;
                        })
                        ->filter(function ($instance) use ($request) {
                            if ($request->get('search') != "") {
                                 $instance->where(function($w) use($request){
                                    $search = $request->get('search');
                                    $w->orWhere('subcategories.subcategory_name', 'LIKE', "%$search%");
                                });
                            }

                            if ($request->get('category_id') != "") {
                                 $instance->where(function($w) use($request){
                                    $category_id = $request->get('category_id');
                                    $w->orWhere('subcategories.category_id', $category_id);
                                });
                            }


                            if ($request->get('status') == 'Publish' || $request->get('status') == 'Unpublish') {
                                $instance->where('subcategories.status', $request->get('status'));
                            }
                            
                        })
                        ->rawColumns(['action', 'status'])
                        ->make(true); 
            }
            
            return view('subcategories.index'); 
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
            return view('subcategories.create');
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
    public function store(StoreSubcategoryRequest $request)
    {
        try
        {
            if($request->file('subcategory_image'))
            {   
                $file = $request->file('subcategory_image');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/subcategories/', $name); 
                $path = 'public/uploads/subcategories/'.$name;
            }

            $subcategory = new Subcategory();
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->status = $request->status;
            $subcategory->subcategory_image = $path;
            $subcategory->save();
            $notification=array(
                             'messege'=>"Successfully subcategory has been added",
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
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        try
        {
           return view('subcategories.edit', compact('subcategory')); 
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
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
            try
            {
                if($request->file('subcategory_image'))
                {   
                    $file = $request->file('subcategory_image');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/uploads/subcategories/', $name); 
                    $path = 'public/uploads/subcategories/'.$name;
                    unlink($subcategory->subcategory_image);
                }
                else
                {
                    $path = $subcategory->subcategory_image;
                }

                $subcategory->category_id = $request->category_id;
                $subcategory->subcategory_name = $request->subcategory_name;
                $subcategory->status = $request->status;
                $subcategory->subcategory_image = $path;
                $subcategory->update();
                $notification=array(
                                 'messege'=>"Successfully subcategory has been updated",
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
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        try
        {
           unlink($subcategory->subcategory_image);
           $subcategory->delete();
           return response()->json("Successfully Subcategory has been deleted");
        }catch(Exception $e){
                      
                    $message = $e->getMessage();
          
                    $code = $e->getCode();       
          
                    $string = $e->__toString();       
                    return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                    exit;
            }
    }
}
