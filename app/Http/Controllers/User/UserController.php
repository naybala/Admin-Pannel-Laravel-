<?php

namespace App\Http\Controllers\User;

use App\Models\Pizza;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

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
        $searchDataFormAutoComplete = $request->all()['searchData'];
        $searchDataFormForm= $request->all()['search'];
        if(strlen($searchDataFormAutoComplete) >= strlen($searchDataFormForm)){
            if($request->all()['searchData']!= null){
                $data = Pizza::where('pizza_name', 'like', '%' . $request->searchData . '%')
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
        }else{
            if($request->all()['search']!= null){
                $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')
                ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                ->where('publish_status',1)
                ->orderBy('pizza_name', 'asc')
                ->paginate(6);
                $data->appends($request->all());
                $countData = count($data);
            $relatedProduct = $this->relatedData();
            return view('user.pizza.pizzaListSearch')->with(['pizza' => $data,'countData'=>$countData,'relatedProduct'=>$relatedProduct]);

            }else{
                $countData = 0;
                $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')->paginate(6);

            }
            $relatedProduct = $this->relatedData();
            return view('user.pizza.pizzaListSearch')->with(['pizza' => $data,'countData'=>$countData,'relatedProduct'=>$relatedProduct]);
        }
    }
    //Product Details
    public function productDetail($id){
        $data = Pizza::where('pizza_id',$id)
                ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                ->first();
        return view('user.viewDetail')->with(['productDetail'=>$data]);
    }

    public function confirmOrder(Request $request,$id){
        $amount = $request->all()['amount'];
        $data =  Pizza::where('pizza_id',$id)
        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
        ->first();
        return view('user.order')->with(['data'=>$data,'amount'=>$amount]);
    }
    public function order(Request $request,$id){
        $check = $request->all()['check'];
      if($check === "1"){
        $data = $this->requestOrderOldData($request, $id);
      }else{

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

        $data = $this->requestOrderNewData($request, $id);
      }
      Order::create($data);
      return view('user.thankYou');
    }

    //Order new Array Function
    private function requestOrderNewData(Request $request,$id){
        return $arrNew = [
            'customer_id'=> Auth()->user()->id,
            'name' => $request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'pizza_id'=>$id,
            'amount'=>$request->amount,
            'payment_id'=>$request->radio,

        ];
    }
    //Order old Array Function
    private function requestOrderOldData(Request $request,$id){
        return $arrOld = [
            'customer_id'=> Auth()->user()->id,
            'name' =>Auth()->user()->name,
            'email'=>Auth()->user()->email,
            'phone'=>Auth()->user()->phone,
            'address'=>Auth()->user()->address,
            'pizza_id'=>$id,
            'amount'=>$request->amount,
            'payment_id'=>$request->radio,

        ];
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