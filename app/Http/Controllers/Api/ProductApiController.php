<?php

namespace App\Http\Controllers\Api;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ProductApiController extends Controller
{
    public function getList(){
        $product = Pizza::get();
        return Response::json($product);
    }
}
