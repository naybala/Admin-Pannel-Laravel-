<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
        //Direct admin OrderList-------------------------------------------------------------------
        public function order()
        {
            $data = Order::leftJoin('pizzas','orders.pizza_id','=','pizzas.pizza_id')->paginate(5);

                    // ->paginate(5);
            return view('admin.order.order_list')->with(['data'=>$data]);
        }
}