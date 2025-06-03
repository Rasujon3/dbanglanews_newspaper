<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Auth; 

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
                $data = News::latest()->select('*');
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('category_name', function($row){
                            return $row->category->category_name;
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
                                $btn .= ' <a href="#" class="btn btn-danger btn-sm decline-news action-button" data-id="'.$row->id.'"><i class="fa fa-ban"></i></a>';
                            }
                            else
                            {
                                $btn .= ' <a href="#" class="btn btn-primary btn-sm active-news action-button" data-id="'.$row->id.'"><i class="fa fa-check" aria-hidden="true"></i></a>';
                            }

                            $btn .= '&nbsp;';


                            $btn .= ' <a href="'.route('news.show',$row->id).'" class="btn btn-primary btn-sm action-button"><i class="fa fa-edit"></i></a>';

                            $btn .= '&nbsp;';


                              $btn .= ' <a href="#" class="btn btn-danger btn-sm delete-news action-button" data-id="'.$row->id.'"><i class="fa fa-trash"></i></a>'; 
        
                                return $btn;
                        })
                        ->filter(function ($instance) use ($request) {
                            if ($request->get('search') != "") {
                                 $instance->where(function($w) use($request){
                                    $search = $request->get('search');
                                    $w->orWhere('news.title', 'LIKE', "%$search%");
                                });
                            }

                            if ($request->get('category_id') != "") {
                                 $instance->where(function($w) use($request){
                                    $category_id = $request->get('category_id');
                                    $w->orWhere('news.category_id', $category_id);
                                });
                            }

                            if ($request->get('subcategory_id') != "") {
                                 $instance->where(function($w) use($request){
                                    $subcategory_id = $request->get('subcategory_id');
                                    $w->orWhere('news.subcategory_id', $subcategory_id);
                                });
                            }


                            if ($request->get('status') == 'Publish' || $request->get('status') == 'Unpublish') {
                                $instance->where('news.status', $request->get('status'));
                            }
                            
                        })
                        ->rawColumns(['action', 'status', 'category_name'])
                        ->make(true); 
            }
            
            return view('news.index'); 
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
            return view('news.create');
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
    public function store(StoreNewsRequest $request)
    {
        try
        {
            if($request->file('image'))
            {   
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/news/', $name); 
                $path = 'public/uploads/news/'.$name;
            }

            $tags = strip_tags($request->description);

            $news = new News;
            $news->user_id = Auth::user()->id;
            $news->title = $request->title;
            $news->slug = str_replace(" ", "-", strtolower($request->title));
            $news->category_id = $request->category_id;
            $news->subcategory_id = $request->subcategory_id;
            $news->specialcategory_id = $request->specialcategory_id;
            $news->description = $request->description;
            $news->short_description = substr($tags, 0, 100);
            $news->date = date('Y-m-d');
            $news->date_two = date('d F Y');
            $news->month = date('F');
            $news->year = date('Y');
            $news->time = date('h:i:s A');
            $news->breaking_news = $request->breaking_news;
            $news->status = $request->status;
            $news->image = $path;
            $news->save();



            $notification=array(
                             'messege'=>"Successfully news has been added",
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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        try
        {
            return view('news.edit', compact('news'));
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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        try
        {
            if($request->file('image'))
            {   
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/uploads/news/', $name); 
                $path = 'public/uploads/news/'.$name;
                unlink($news->image);
            }
            else
            {
                $path = $news->image;
            }

            $tags = strip_tags($request->description);

            $news->user_id = Auth::user()->id;
            $news->title = $request->title;
            $news->slug = str_replace(" ", "-", strtolower($request->title));
            $news->category_id = $request->category_id;
            $news->subcategory_id = $request->subcategory_id;
            $news->specialcategory_id = $request->specialcategory_id;
            $news->description = $request->description;
            $news->short_description = substr($tags, 0, 100);
            $news->date =  $news->date;
            $news->date_two = $news->date_two;
            $news->month = $news->month;
            $news->year = $news->year;
            $news->time = $news->time;
            $news->breaking_news = $request->breaking_news;
            $news->status = $request->status;
            $news->image = $path;
            $news->update();



            $notification=array(
                             'messege'=>"Successfully news has been updated",
                             'alert-type'=>'success'
                            );

            return redirect('news')->with($notification);
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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try
        {
            unlink($news->image);
            $news->delete();
            return response()->json('Successfully the news has been deleted');
        }catch(Exception $e){
                  
                $message = $e->getMessage();
      
                $code = $e->getCode();       
      
                $string = $e->__toString();       
                return response()->json(['message'=>$message, 'execption_code'=>$code, 'execption_string'=>$string]);
                exit;
        } 
    }
}
