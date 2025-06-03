<?php

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Specialcategory;
use App\Models\News;
use App\Models\Field;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

function categories()
{
	$categories = Category::latest()->get();
	return $categories;
}

function subcategories()
{
	$subcategories = Subcategory::latest()->get();
	return $subcategories;
}

function specialcategories()
{
	$specialcategories = Specialcategory::latest()->get();
	return $specialcategories;
}

function allBreakingNews()
{
	$data = News::where('breaking_news', 1)->where('status','Publish')->latest()->get();
	return $data;
}

function limitBreakingNews()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->where('news.breaking_news', 1)->where('news.status','Publish')->select('news.*', 'categories.category_name', 'users.name as author')->take(2)->latest()->get();
	return $data;
}

function limitPopularCategories()
{
	$data = DB::table('news')
	                   ->join('categories', 'news.category_id', 'categories.id')
					    ->select('news.*', 'categories.category_name', DB::raw('COUNT(*) as count'))
					    ->groupBy('category_id')
					    ->orderBy('category_id')
					    ->get();
	return $data;
}

function latestNews()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')
	               ->join('users', 'news.user_id', 'users.id')
	               ->select('news.*', 'categories.category_name', 'users.name as author')
	               ->orderBy('news.id', 'DESC')
	               ->get();
	return $data;
}


function limitLatestNews()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')
	               ->join('users', 'news.user_id', 'users.id')
	               ->select('news.*', 'categories.category_name', 'users.name as author')
	               ->take(5)
	               ->orderBy('news.id', 'DESC')
	               ->get();
	return $data;
}

function popularCategory()
{
	$data = DB::table('news')
	                   ->join('categories', 'news.category_id', 'categories.id')
					    ->select('news.*', 'categories.category_name', 'categories.category_image', DB::raw('COUNT(*) as count'))
					    ->groupBy('category_id')
					    ->orderBy('category_id')
					    ->take(1)
					    ->first();
	return $data;
}

function popularcategoryPosts()
{
	$data = News::where('category_id',popularCategory()->id)->limit(3)->get();
	return $data;
}

function popularPosts()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')
	               ->join('users', 'news.user_id', 'users.id')
	               ->select('news.*', 'categories.category_name', 'users.name as author')
	               ->take(4)
	               ->orderBy('news.hit_count', 'DESC')
	               ->get();
	return $data;
}

function recentPosts()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')
	               ->join('users', 'news.user_id', 'users.id')
	               ->select('news.*', 'categories.category_name', 'users.name as author')
	               ->take(3)
	               ->orderBy('news.id', 'DESC')
	               ->get();
    return $data;
}

function otherpopularCategory()
{
	$data = DB::table('news')
	                   ->join('categories', 'news.category_id', 'categories.id')
					    ->select('news.*', 'categories.category_name', 'categories.category_image', DB::raw('COUNT(*) as count'))
					    ->where('news.category_id', popularCategory()->id)
					    ->groupBy('category_id')
					    ->orderBy('category_id')
					    ->take(1)
					    ->first();
	return $data;
}

function otherpopularCategoryPosts()
{
	$data = News::where('category_id',otherpopularCategory()->id)->limit(2)->get();
	return $data;
}

function limitBreakingTwos()
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->where('news.breaking_news', 1)->where('news.status','Publish')->select('news.*', 'categories.category_name', 'users.name as author')->take(4)->latest()->get();
	return $data;
}

function nestedCategories()
{   
	//nested categories
	$get_category_ids = News::pluck('category_id')->toArray();
	$category_ids = array_unique($get_category_ids);
	$data = Category::whereIn('id',$category_ids)->limit(3)->latest()->get();
	return $data;
}

function nestedCategoryPosts($id)
{
	$data = News::where('category_id',$id)->limit(3)->get();
	return $data;
}

function navCategories()
{
	$get_category_ids = News::pluck('category_id')->toArray();
	$category_ids = array_unique($get_category_ids);
	$data = Category::whereIn('id',$category_ids)->limit(10)->latest()->get();
	return $data;
}

function limitrecentPostsByCategory($id)
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->select('news.*', 'categories.category_name', 'users.name as author')->where('news.category_id',$id)->latest()->take(2)->get();
	return $data;
}

function popularPostsByCategory($id)
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->select('news.*', 'categories.category_name', 'users.name as author')->where('news.category_id',$id)->orderBy('hit_count', 'DESC')->get();
	return $data;
}

function paginatePostsByCategory($id)
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->select('news.*', 'categories.category_name', 'users.name as author')->where('news.category_id',$id)->paginate(5);
	return $data;
}

function newsDetails($slug)
{
	$data = News::join('categories', 'news.category_id', 'categories.id')->join('users', 'news.user_id', 'users.id')->select('news.*', 'categories.category_name', 'users.name as author')->where('news.slug',$slug)->first();
	return $data;
}

function limitRelatedNews($category_id,$slug)
{
    $data = News::join('categories', 'news.category_id', 'categories.id')->where('news.category_id',$category_id)->where('news.id', '!=', newsDetails($slug)->id)->select('news.*', 'categories.category_name')->limit(3)->get();
    return $data;
}

function checkAuthorizarion($id)
{
	$user = User::findorfail($id);
	$field = Field::where('role_id',$user->role_id)->first();
	return $field;
}

function fieldDetails($id)
{
	$role = Field::where('role_id',$id)->first();
	return $role;
}

function createAuthorization(Request $request,$get_role)
{    

	 if($request->category)
	 {
	 	$category = 1;
	 }
	 else
	 {
	 	$category = 0;
	 }

	 if($request->subcategory)
	 {
	 	$subcategory = 1;
	 }
	 else
	 {
	 	$subcategory = 0;
	 }


	 if($request->news)
	 {
	 	$news = 1;
	 }
	 else
	 {
	 	$news = 0;
	 }


	 if($request->get_role)
	 {
	 	$get_role = 1;
	 }
	 else
	 {
	 	$get_role = 0;
	 }

     $data = array();
     $data['role_id'] = $role->id;
     $data['category'] = $category;
     $data['subcategory'] = $subcategory;
     $data['news'] = $news;
     $data['get_role'] = $get_role;
     DB::table('fields')->insert($data);
}

function updateAuthorization(Request $request, $role)
{
	if($request->category)
	 {
	 	$category = 1;
	 }
	 else
	 {
	 	$category = 0;
	 }

	 if($request->subcategory)
	 {
	 	$subcategory = 1;
	 }
	 else
	 {
	 	$subcategory = 0;
	 }


	 if($request->news)
	 {
	 	$news = 1;
	 }
	 else
	 {
	 	$news = 0;
	 }


	 if($request->get_role)
	 {
	 	$get_role = 1;
	 }
	 else
	 {
	 	$get_role = 0;
	 }

     $data = array();
     $data['role_id'] = $role->id;
     $data['category'] = $category;
     $data['subcategory'] = $subcategory;
     $data['news'] = $news;
     $data['get_role'] = $get_role;
     DB::table('fields')->where('id', fieldDetails($role->id)->id)->update($data);
}

function roles()
{
	$roles = Role::where('id', '!=', 1)->get();
	return $roles;
}