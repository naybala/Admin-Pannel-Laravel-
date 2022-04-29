<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class UserApiController extends Controller
{
    public function getList(){
        $user = User::get();
        return Response::json($user);
        // $response = [
        //     'status' => "success",
        //     'data' => $user
        // ];
        // return Response::json($response);
    }

    public function createCategory(){
        $data = [

        ];
    }

}
