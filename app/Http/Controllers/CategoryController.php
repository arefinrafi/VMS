<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;  

class CategoryController extends Controller
{

    //Category field er data DB te store 
    public function addCategory(Request $request){
    	if($request->isMethod('post'))
    	{
    	$data= $request->all();
    	//echo "<pre>"; print_r($data); die;
    	$category = new Category;
    	$category->name = $data['category_name'];
        $category->parent_id = $data['parent_id'];
    	// $category->description = $data['description'];
    	$category->url = $data['url'];
    	$category->save(); 
        return redirect('/backend/view-categories')->with('flash_message_success','Category Added Succesfully');
    }
    	$levels = Category::where(['parent_id'=>0])->get();
    	return view('backend.categories.add-category')->with(compact("levels"));
    }

    // Category field er Stored data update 
    public function editCategory(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'url'=>$data['url']]);
        return redirect('/backend/view-categories')->with('flash_message_success','Category Updated Succesfully');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        $levels = Category::where(['parent_id'=>0])->get();
        return view('backend.categories.edit-category')->with(compact('categoryDetails','levels'));
    }

     public function deleteCategory(Request $request, $id = null){
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_error','Category deleted Succesfully');
        }

     }

    public function viewcategories()
    {
        $categories = Category::get();
        // echo "test"; die;
        return view('backend.categories.view-categories')->with(compact('categories'));
    }


}