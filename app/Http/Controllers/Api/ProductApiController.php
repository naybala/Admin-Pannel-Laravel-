<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ProductApiController extends Controller
{
    //Get Pizza List
    public function getList(){
        $product = Pizza::get();
        return Response::json($product);
    }


    // Delete Pizza List
    public function deletePizza(Request $request){
        $response = Pizza::where('pizza_id',$request->id)->delete();
        return Response::json($response);
    }


    public function editPizza (Request $request){
        $updateData = [
            'pizza_name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $check = Pizza::where('pizza_id', $request->id)->first();
        if(!empty($check)){
            Pizza::where('pizza_id', $request->id)->update($updateData);
            $response = [
                'status' => 200 ,
                'message' => 'success'
            ];
            return Response::json($response);
        }
    }
}