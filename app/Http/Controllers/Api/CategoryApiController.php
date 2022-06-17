<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class CategoryApiController extends Controller
{

    //Get Category
    public function getList(){
        $category = Category::get();
        return Response::json($category);
    }


    //Create Category
    public function createCategory(Request $request){
        $data = [
            'category_name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Category::create($data);

        $response = [
            'status' => 200 ,
            'message' => 'success'
        ];
        return Response::json($response);

    }

    //Edit Category
    public function editCategory(Request $request){
        $updateData = [
            'category_name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $check = Category::where('category_id', $request->id)->first();
        if(!empty($check)){
            Category::where('category_id', $request->id)->update($updateData);
            $response = [
                'status' => 200 ,
                'message' => 'success'
            ];
            return Response::json($response);
        }

    }
     //Delete Category
     public function deleteCategory(Request $request){
        $response = Category::where('category_id',$request->id)->delete();
        return Response::json($response);
    }
}
