<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{   

	public function indexPage()
	{  
		try
		{   
			return view('layouts.front_app');
		}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
	}

    public function loginPage()
    {
    	return view('admin_login');
    }
}
