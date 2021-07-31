<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    Public function AllCategory(){

        $categories = Category::latest()->paginate(3,['*'],'categories');

        $trash_categories = Category::onlyTrashed()->latest()->paginate(3, ['*'],'trash_categories');

        
        return view('admin.category.index', compact('categories','trash_categories'));
    }

    public function AddCategory(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'Category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->user_id;
        // $category->save();
        return redirect()->back()->with('success','Category inserted successfully');


         
    }

    public function Edit($id){

        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));

    }

    public function update(Request $request, $id){
        $category = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            
        ]);

        return Redirect()->route('all.category')->with('success','Category Updated successfully');
    }

    public function SoftDelete($id){

        $category = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Deleted successfully');

    }

    public function Restore($id){

        $category = Category::onlyTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category restored successfully');

    }

    public function ParmanentDelete($id){

        $category = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category parmanently deleted successfully');

    }

}
