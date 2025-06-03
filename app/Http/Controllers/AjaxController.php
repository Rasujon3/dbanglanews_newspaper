<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Specialcategory;
use App\Models\News;
use App\Models\User;
class AjaxController extends Controller
{
    public function declineCategory($id)
    {
        try
        {
           Category::where('id',$id)->update(['status'=>'Unpublish']);
           return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function activeCategory($id)
    {
        try
        {
           Category::where('id',$id)->update(['status'=>'Publish']);
           return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function declineSubcategory($id)
    {
        try
        {
            Subcategory::where('id',$id)->update(['status'=>'Unpublish']);
            return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function activeSubcategory($id)
    {
        try
        {
            Subcategory::where('id',$id)->update(['status'=>'Publish']);
            return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function activeSpecialCategory($id)
    {
        try
        {
            Specialcategory::where('id',$id)->update(['status'=>'Publish']);
            return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function declineSpecialCategory($id)
    {
        try
        {
            Specialcategory::where('id',$id)->update(['status'=>'Unpublish']);
            return response()->json('Successfully status has been updated');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function getSubcategories($id)
    {
        try
        {
            $subcategories = Subcategory::where('category_id',$id)->latest()->get();
            return view('ajax.subcategories', compact('subcategories'));
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function activeNews($id)
    {
        try
        {
            News::where('id',$id)->update(['status'=>'Publish']);
            return response()->json('Successfully status has been changed');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function declineNews($id)
    {
        try
        {
            News::where('id',$id)->update(['status'=>'Unpublish']);
            return response()->json('Successfully status has been changed');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }


    public function activeUser($id)
    {
        try
        {
            User::where('id',$id)->update(['status'=>'Publish']);
            return response()->json('Successfully status has been changed');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

    public function declineUser($id)
    {
        try
        {
            User::where('id',$id)->update(['status'=>'Unpublish']);
            return response()->json('Successfully status has been changed');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        }
    }

}
