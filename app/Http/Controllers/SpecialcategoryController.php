<?php

namespace App\Http\Controllers;

use App\Models\Specialcategory;
use Illuminate\Http\Request; 
use DataTables;
use App\Http\Requests\StoreSpecialCategory;
use App\Http\Requests\UpdateSpecialCategory;
class SpecialcategoryController extends Controller
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
                $data = Specialcategory::latest()->select('*');
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
                                $btn .= ' <a href="#" class="btn btn-danger btn-sm decline-specialcategory action-button" data-id="'.$row->id.'"><i class="fa fa-ban"></i></a>';
                            }
                            else
                            {
                                $btn .= ' <a href="#" class="btn btn-primary btn-sm active-specialcategory action-button" data-id="'.$row->id.'"><i class="fa fa-check" aria-hidden="true"></i></a>';
                            }

                            $btn .= '&nbsp;';


                            $btn .= ' <a href="'.route('specialcategories.show',$row->id).'" class="btn btn-primary btn-sm action-button"><i class="fa fa-edit"></i></a>';

                            $btn .= '&nbsp;';


                              $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-specialcategory action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
        
                                return $btn;
                        })
                        ->rawColumns(['action', 'status'])
                        ->make(true); 
            }
            
            return view('specialcategories.index'); 
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
            return view('specialcategories.create');
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
    public function store(StoreSpecialCategory $request)
    {
        try
        {
                if($request->file('image'))
                {   
                    $file = $request->file('image');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/uploads/specialcategory/', $name); 
                    $path = 'public/uploads/specialcategory/'.$name;
                }

                $specialcategory = new Specialcategory();
                $specialcategory->name = $request->name;
                $specialcategory->status = $request->status;
                $specialcategory->image = $path;
                $specialcategory->save();
                $notification=array(
                                 'messege'=>"Successfully specialcategory has been added",
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
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Specialcategory $specialcategory)
    {
        try
        {
            return view('specialcategories.edit', compact('specialcategory'));
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
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialCategory $request, Specialcategory $specialcategory)
    {
        try
        {
                if($request->file('image'))
                {   
                    $file = $request->file('image');
                    $name = time().$file->getClientOriginalName();
                    $file->move(public_path().'/uploads/specialcategory/', $name); 
                    $path = 'public/uploads/specialcategory/'.$name;
                    unlink($specialcategory->image);
                }
                else
                {
                    $path = $specialcategory->image;
                }

                $specialcategory->name = $request->name;
                $specialcategory->status = $request->status;
                $specialcategory->image = $path;
                $specialcategory->update();
                $notification=array(
                                 'messege'=>"Successfully specialcategory has been updated",
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
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialcategory $specialcategory)
    {
        try
        {
            unlink($specialcategory->image);
            $specialcategory->delete();
            return response()->json('Special category has been deleted');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
