<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\News;
class DetailsController extends Controller
{
    public function categoryDetails($id)
    {
    	try
    	{
    		return view('category_details', compact('id'));
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function newsDetails($slug)
    {
    	try
    	{
    		return view('news_details', compact('slug'));
    	}catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function about()
    {
    	return view('about');
    }


    public function contact()
    {
    	return view('contact');
    }
}
