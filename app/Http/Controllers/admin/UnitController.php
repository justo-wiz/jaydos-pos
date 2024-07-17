<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function ShowUnit()
    {
        $unitData = Unit::latest()->get();
        return view('admin-views.pages.all-units', compact('unitData'));
    } //end method
    public function Addunit()
    {
        return view('admin-views.pages.add-unit');
    } //end method
    public function StoreUnit(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:units|max:200',
            'slug' => 'required',
        ]);
        Unit::insert([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Unit Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.unit')->with($notification);
    } //end method
    public function EditUnit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('admin-views.pages.edit-unit', compact('unit'));
    } //end method
    public function UpdateUnit(Request $request)
    {
        $un_id = $request->id;
        Unit::findOrFail($un_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.unit')->with($notification);
    } //end method

    public function DeleteUnit($id)
    {
        Unit::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Unit Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
}
