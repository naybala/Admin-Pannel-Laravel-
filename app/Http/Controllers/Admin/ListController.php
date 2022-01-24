<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //Direct admin List-------------------------------------------------------------------
    public function adminList()
    {
        $data = User::where('role', 'admin')->paginate(5);
        return view('admin.user.admin_list')->with(['adminList' => $data]);

    }

    //User List
    public function userList()
    {
        $data = User::where('role', 'user')->paginate(5);
        return view('admin.user.user_list')->with(['userList' => $data]);
    }

    //User List Search
    public function userSearch(Request $request)
    {
        $key = $request->tableSearch;
        $searchData = User::where('role', 'user')
            ->where(function ($query) use ($key) {
                $query->orWhere('name', 'like', '%' . $key . '%')
                    ->orWhere('email', 'like', '%' . $key . '%')
                    ->orWhere('phone', 'like', '%' . $key . '%')
                    ->orWhere('address', 'like', '%' . $key . '%');
            })->paginate(5);

        $searchData->appends($request->all());
        return view('admin.user.user_list')->with(['userList' => $searchData]);
    }

    //Admin List Search
    public function adminSearch(Request $request)
    {
        $key = $request->tableSearch;
        $searchData = User::where('role', 'admin')
            ->where(function ($query) use ($key) {
                $query->orWhere('name', 'like', '%' . $key . '%')
                    ->orWhere('email', 'like', '%' . $key . '%')
                    ->orWhere('phone', 'like', '%' . $key . '%')
                    ->orWhere('address', 'like', '%' . $key . '%');
            })->paginate(5);

        $searchData->appends($request->all());
        return view('admin.user.admin_list')->with(['adminList' => $searchData]);
    }
}