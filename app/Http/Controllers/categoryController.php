<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Category;

class categoryController extends Controller
{
    public function addcategory(Request $request){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            $category = new Category;

            $category->category_name = $data['category_name'];
            $category->url = $data['url'];
            $category->description = $data['description'];
            $category->status = $status;

            $category->save();

            return redirect('admin/view-categories')->with('flash-message-s','Category added successfully');

        }
        return view('admin.category.add_category');

    }
    public function viewcategory(){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        $categories = Category::get();
        return view('admin.category.view_categories')->with(compact('categories'));
    }
    public function editcategory(Request $request, $id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        if($request->isMethod('post')){
            $data = $request->all();
            
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            Category::where('id',$id)->update(['category_name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url'],'status'=>$status]);
            return redirect('admin/view-categories')->with('flash-message-s','Category added successfully');
        }
        $categoryEdit = Category::where('id',$id)->first();
        return view('admin.category.edit_category')->with(compact('categoryEdit'));

    }
    public function delcategory($id){
        $admin = Auth::guard('admin')->user();
        if(!Gate::forUser($admin)->allows('isAdmin')){
            return view('admin.restricted');
        }
        Category::where('id',$id)->delete();
        return redirect('admin/view-categories');
    }
}
