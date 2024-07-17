<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard()
    {

        $notification = array(
            'message' => 'Logged in Successfully',
            'alert-type' => 'success'
        );
        return view('admin-views.index')->with($notification);
    } //end method

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logged out Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    } // end method

    public function login()
    {
        return view('admin-views.components.login');
    } //end method

    public function editprofile()
    {
        $id = Auth::user()->id;
        $profiledata = User::find($id);
        return view('admin-views.components.editprofile', compact('profiledata'));
    } //end method

    public function UpdateProfile(Request $request)
    {

        $id = Auth::user()->id;
        $profiledata = User::find($id);
        $profiledata->username = $request->username;
        $profiledata->name = $request->name;
        $profiledata->email = $request->email;
        $profiledata->phone = $request->phone;
        $profiledata->address = $request->address;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('backend/admin/uploads/user/' . $profiledata->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/admin/uploads/user'), $filename);
            $profiledata['photo'] = $filename;
        }

        $profiledata->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
    public function ChangePassword()
    {
        $id = Auth::user()->id;
        $profiledata = User::find($id);

        return view('admin-views.components.changepassword', compact('profiledata'));
    } //end method
    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        //match old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password does not Match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        //update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } //end method
   
}
