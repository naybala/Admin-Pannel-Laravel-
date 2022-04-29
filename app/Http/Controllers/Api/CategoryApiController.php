<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class CategoryApiController extends Controller
{
    public function getList(){
        $category = Category::get();
        return Response::json($category);
    }
}