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
        $relatedProduct = Pizza::get();
        $countData = count($data);
        return view('user.category_pizza_List.categoryPizzaList')->with(['categoryPizza' => $data,'countData' => $countData,'categoryType' => $product,'relatedProduct'=>$relatedProduct]);

     }
     //All Search
    public function allSearch(Request $request)
    {
         //Start Error from Here
        //  dd($request->all()['search']);
       if($request->all()['search']!= null){
                $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')
                ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                ->where('publish_status',1)
                ->paginate(6);
                $data->appends($request->all());
                $countData = count($data);
        }else{
            $countData = 0;
            $data = Pizza::where('pizza_name', 'like', '%' . $request->search . '%')->paginate(6);
        }
        $relatedProduct = Pizza::select("*")
                        ->leftJoin('categories','pizzas.category_id','=','categories.category_id')
                        ->where('publish_status',1)
                        ->orderBy('pizza_name', 'asc')
                        ->get();
         return view('user.pizza.pizzaListSearch')->with(['pizza' => $data,'countData'=>$countData,'relatedProduct'=>$relatedProduct]);

    }

}


//  //Send Contact
//  public function sendContact(Request $request)
//  {
//      $validator = Validator::make($request->all(), [
//          'name' => 'required',
//          'email' => 'required',
//          'message' => 'required',

//      ]);
//      if ($validator->fails()) {
//          return back()
//              ->withErrors($validator)
//              ->withInput();
//      }
//      $userId = Auth()->user()->id;
//      $data = $this->RequestData($request, $userId);
//      Contact::create($data);
//      return back()->with(['sendSuccess' => 'Send Successfully']);
//  }
//  private function RequestData($request, $userId)
//  {
//      return $arr = [
//          'name' => $request->name,
//          'user_id' => $userId,
//          'email' => $request->email,
//          'message' => $request->message,
//      ];

//  }
//  //Pizza Details
//  public function detail($id)
//  {
//      $dataCategory = Category::get();
//      $data = Pizza::where('pizza_id', $id)->first();
//      return view('user.detail')->with(['detail' => $data, 'category' => $dataCategory]);
//  }
//  ////////////Category With Pizza List/////////////
//  public function categoryPizzaList($id)
//  {
//      $data = Pizza::where('category_id', $id)->get();
//      $countData = count($data);
//      $dataCategory = Category::get();
//      $relatedProduct = Pizza::get();

//      // dd($relatedProduct->toArray());
//      return view('user.categoryPizzaList')->with(['categoryPizza' => $data, 'category' => $dataCategory, 'id' => $id, 'relatedProduct' => $relatedProduct, 'countData' => $countData]);
//  }
//  public function allPizzaList()
//  {
//      $allData = Pizza::paginate(4);
//      return view('user.allPizzaList')->with(['allPizza' => $allData]);
//  }
//  //All Search
//  public function allSearch(Request $request)
//  {
//      $data = Pizza::where('pizza_name', 'like', '%' . $request->allSearch . '%')->paginate(5);
//      $data->appends($request->all());
//      $category = Category::get();
//      return view('user.user_home')->with(['pizza' => $data, 'category' => $category]);

//  }
//  //Min Max Search
//  public function minMaxSearch(Request $request)
//  {
//      // dd($request->all());
//      $min = $request->minSearch;
//      $max = $request->maxSearch;
//      $data = Pizza::select('*');
//      if (!is_null($min) && is_null($max)) {
//          $data = $data->where('price', '>=', $min);
//      } elseif (is_null($min) && !is_null($max)) {
//          $data = $data->where('price', '<=', $max);
//      } elseif (!is_null($min) && !is_null($max)) {
//          $data = $data->where('price', '>=', $min)
//              ->where('price', '>=', $max);
//      }
//  }