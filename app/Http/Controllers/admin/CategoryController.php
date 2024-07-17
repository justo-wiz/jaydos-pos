<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ShowCategories()
    {
        $categories = Category::latest()->get();
        return view('admin-views.pages.all-categories', compact('categories'));
    } //end method
    public function AddCategory()
    {
        return view('admin-views.pages.add-category');
    } //end method

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:200',
            'slug' => 'required',
        ]);
        Category::insert([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Category Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    } //end method

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin-views.pages.editcategory', compact('category'));
    } //end method

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        Category::findOrFail($cat_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    } //end method

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } //end method

}
