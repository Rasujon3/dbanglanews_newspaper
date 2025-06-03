<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
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
        if($request->ajax()) {
                $data = User::where('id','!=',1)->select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('role', function($row){
                            return $row->role->name;
                        })

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
                                $btn .= ' <a href="#" class="btn btn-danger btn-sm decline-user action-button" data-id="'.$row->id.'"><i class="fa fa-ban"></i></a>';
                            }
                            else
                            {
                                $btn .= ' <a href="#" class="btn btn-primary btn-sm active-user action-button" data-id="'.$row->id.'"><i class="fa fa-check" aria-hidden="true"></i></a>';
                            }

                            $btn .= '&nbsp;';


                            $btn .= ' <a href="'.route('users.show',$row->id).'" class="btn btn-primary btn-sm action-button"><i class="fa fa-edit"></i></a>';

                            $btn .= '&nbsp;';


                              $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-user action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
        
                                return $btn;
                        })
                        ->rawColumns(['action', 'role', 'status'])
                        ->make(true); 
            }
            
            return view('users.index');
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
           return view('users.create');
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
    public function store(RegisterUserRequest $request)
    {
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->status = 'Publish';
            $user->password = bcrypt('12345');
            $user->save();
            $notification=array(
                             'messege'=>"Successfully user has been added",
                             'alert-type'=>'success'
                            );

            return Redirect('/users')->with($notification);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try
        {
             return view('users.edit', compact('user'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try
        {
            $user->name = $request->name;
            $user->role_id = $request->role_id;
            $user->email = $request->email;
            $user->status = $user->status;
            $user->password = bcrypt('12345');
            $user->update();
            $notification=array(
                             'messege'=>"Successfully user has been updated",
                             'alert-type'=>'success'
                            );

            return Redirect('/users')->with($notification);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try
        {
            $user->delete();
            return response()->json('User has been deleted');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }
}
