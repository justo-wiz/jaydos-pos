<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function ShowBrand()
    {
        $brand = Brand::latest()->get();
        return view('admin-views.pages.all-brands', compact('brand'));
    } //end method
    public function AddBrand()
    {
        return view('admin-views.pages.add-brand');
    } //end method
    public function StoreBrand(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:200',
            'slug' => 'required',
        ]);
        Brand::insert([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Brand Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    } //end method
    public function EditBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin-views.pages.edit-brand', compact('brand'));
    } //end method
    public function UpdateBrand(Request $request)
    {
        $bra_id = $request->id;
        Brand::findOrFail($bra_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.brand')->with($notification);
    } //end method

    public function DeleteBrand($id)
    {
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
}
