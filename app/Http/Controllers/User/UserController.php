<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //direct Route User Page
    public function index()
    {
        $data = Pizza::where('publish_status', 1)->limit(12)->get();
        $category = Category::get();
        return view('user.user_home')->with(['pizza' => $data, 'category' => $category]);
    }
     //direct to Logout Confirm page
     public function logoutConfirm()
     {
        return view('user.logoutConfirm');
     }
      //Logout Cancel
      public function logoutCancel()
      {
        return view('user.user_home');
      }
    //Send Contact
    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $userId = Auth()->user()->id;
        $data = $this->RequestData($request, $userId);
        Contact::create($data);
        return back()->with(['sendSuccess' => 'Send Successfully']);
    }
    private function RequestData($request, $userId)
    {
        return $arr = [
            'name' => $request->name,
            'user_id' => $userId,
            'email' => $request->email,
            'message' => $request->message,
        ];

    }
    //Pizza Details
    public function detail($id)
    {
        $dataCategory = Category::get();
        $data = Pizza::where('pizza_id', $id)->first();
        return view('user.detail')->with(['detail' => $data, 'category' => $dataCategory]);
    }
    ////////////Category With Pizza List/////////////
    public function categoryPizzaList($id)
    {
        $data = Pizza::where('category_id', $id)->get();
        $countData = count($data);
        $dataCategory = Category::get();
        $relatedProduct = Pizza::get();

        // dd($relatedProduct->toArray());
        return view('user.categoryPizzaList')->with(['categoryPizza' => $data, 'category' => $dataCategory, 'id' => $id, 'relatedProduct' => $relatedProduct, 'countData' => $countData]);
    }
    public function allPizzaList()
    {
        $allData = Pizza::paginate(4);
        return view('user.allPizzaList')->with(['allPizza' => $allData]);
    }
    //All Search
    public function allSearch(Request $request)
    {
        $data = Pizza::where('pizza_name', 'like', '%' . $request->allSearch . '%')->paginate(5);
        $data->appends($request->all());
        $category = Category::get();
        return view('user.user_home')->with(['pizza' => $data, 'category' => $category]);

    }
    //Min Max Search
    public function minMaxSearch(Request $request)
    {
        // dd($request->all());
        $min = $request->minSearch;
        $max = $request->maxSearch;
        $data = Pizza::select('*');
        if (!is_null($min) && is_null($max)) {
            $data = $data->where('price', '>=', $min);
        } elseif (is_null($min) && !is_null($max)) {
            $data = $data->where('price', '<=', $max);
        } elseif (!is_null($min) && !is_null($max)) {
            $data = $data->where('price', '>=', $min)
                ->where('price', '>=', $max);
        }
    }
}