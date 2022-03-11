<?php

namespace App\Http\Controllers\User;

use App\Models\Pizza;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //direct Route User Page
    public function index()
    {
        $category = Category::limit(10)->get();
        $product = Pizza::select("*")
                        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                        ->limit(10)->where('publish_status',1)
                        ->get();
        return view('user.userHome')->with(['category' => $category,'product'=>$product]);
    }
     //direct to Logout Confirm page
     public function logoutConfirm()
     {
        return view('user.logoutConfirm');
     }
      //Logout Cancel
      public function logoutCancel()
      {
        $category = Category::limit(10)->get();
        $product = Pizza::select("*")
                        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                        ->limit(10)->where('publish_status',1)
                        ->get();
        return view('user.userHome')->with(['category' => $category,'product'=>$product]);
      }

      //Category Pizza List All
       public function categoryPizzaList($id)
     {
        $product = Category::where('category_id', $id)->first();
        $data = Pizza::where('category_id', $id)->get();
        $relatedProduct = $this->relatedData();
        $countData = count($data);
        return view('user.category_pizza_List.categoryPizzaList')->with(['categoryPizza' => $data,'countData' => $countData,'categoryType' => $product,'relatedProduct'=>$relatedProduct]);

     }
     //All Search
    public function allSearch(Request $request)
    {
       if($request->all()['search']!= null){
                $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')
                ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                ->where('publish_status',1)
                ->orderBy('pizza_name', 'asc')
                ->paginate(6);
                $data->appends($request->all());
                $countData = count($data);
        }else{
            $countData = 0;
            $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')->paginate(6);
        }
         $relatedProduct = $this->relatedData();
         return view('user.pizza.pizzaListSearch')->with(['pizza' => $data,'countData'=>$countData,'relatedProduct'=>$relatedProduct]);

    }
    //Product Details
    public function productDetail($id){
        $data = Pizza::where('pizza_id',$id)
                ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                ->first();
        return view('user.viewDetail')->with(['productDetail'=>$data]);
    }

    public function orderStore(Request $request,$id){
        $amount = $request->all()['amount'];
        $data =  Pizza::where('pizza_id',$id)
        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
        ->first();
        return view('user.order')->with(['data'=>$data,'amount'=>$amount]);
    }
    //Related Product function
    private function relatedData(){
        $relatedProduct = Pizza::select("*")
        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
        ->where('publish_status',1)
        ->orderBy('pizza_name', 'asc')
        ->get();
        return $relatedProduct;
    }
}