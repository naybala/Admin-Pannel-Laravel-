<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //Direct admin Profile-------------------------------------------------------------------
    public function profile()
    {
        $id = auth()->user()->id;
        $userData = User::where('id', $id)->first();
        return view('admin.profile.index')->with(['user' => $userData]);
    }

       //Logout Confirm-------------------------------------------------------------------
       public function logoutConfirm()
       {
        return view('auth.logout-confirm');
       }
        //Logout Cancel-------------------------------------------------------------------
        public function logoutCancel()
        {
            $id = auth()->user()->id;
            $userData = User::where('id', $id)->first();
            return view('admin.profile.index')->with(['user' => $userData]);

        }

    //update Info Admin
    public function updateInfo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $updateData = $this->updateRequestData($request);
        User::where('id', $id)->update($updateData);
        return redirect()->route('admin#profile')->with(['updateSuccess' => 'Update Successfully Admin Info']);
    }
    private function updateRequestData($request)
    {
        return $arr = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    }
    // Direct change Password Page
    public function passwordChangePage($id)
    {

        return view('admin.profile.passwordChangePage')->with(['userId' => $id]);
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmNewPassword' => 'required',

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $confrimNewPassword = $request->confirmNewPassword;
        $userId = $request->id;
        $userData = User::where('id', $userId)->first();
        // dd($userData->password, $oldPassword, $newPassword, $confrimNewPassword);
        if (Hash::check($oldPassword, $userData->password)) {
            if ($newPassword == $confrimNewPassword) {
                $newPasswordLength = Str::length($newPassword);
                $confirmNewPasswordLength = Str::length($confrimNewPassword);
                if ($oldPassword == $newPassword) {
                    return back()->with(['oldAndNew' => 'New Password Must not same as Old Password']);
                } else {
                    if ($newPasswordLength < 8 && $confirmNewPasswordLength < 8) {
                        return back()->with(['errorNewPasswordLength' => 'New Password length Must Be Greater Than 8']);
                    } else {
                        $hash = Hash::make($newPassword);
                        User::where('id', $userId)->update(['password' => $hash]);
                        return redirect()->route('admin#profile');
                    }
                }

            } else {
                return back()->with(['errorNewPassword' => 'New Password Do Not Match']);
            }
        } else {
            return back()->with(['errorOldPassword' => 'Old Password Do Not Match']);
        }

    }
}
