<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PizzaController extends Controller
{
    //Direct admin Pizza List-------------------------------------------------------------------
    public function pizza()
    {
        $data = Pizza::paginate(5); //pizza List
        $data1 = Pizza::first(); //for empty Data
        $categoryData = Category::get(); //category showing
        // dd($categoryData->toArray());
        return view('admin.pizza.pizza_list')->with(['pizza' => $data, 'pizza1' => $data1, 'category' => $categoryData]);
    }
    //Direct admin addPizza -------------------------------------------------------------------
    public function addPizza()
    {
        $category = Category::get();
        return view('admin.pizza.addPizza')->with(['category' => $category]);
    }
    //Direct admin CreatePizza List-------------------------------------------------------------------
    public function createPizza(Request $request)
    {

        // dd($request->image);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'publish' => 'required',
            'category' => 'required',
            'discount' => 'required',
            'buyOneGetOne' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $fileName = uniqid() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/images', $fileName);
        $data = $this->requestPizzaData($request, $fileName);
        Pizza::create($data);
        return redirect()->route('admin#pizza')->with(['createSuccess' => 'SaveSuccessfully']);
        // dd($request->all());
    }
    private function requestPizzaData($request, $fileName)
    {
        return [
            'pizza_name' => $request->name,
            'image' => $fileName,
            'price' => $request->price,
            'publish_status' => $request->publish,
            'category_id' => $request->category,
            'discount_price' => $request->discount,
            'buy_one_get_one_status' => $request->buyOneGetOne,
            'waiting_time' => $request->time,
            'description' => $request->description,

        ];
    }

    //delete Pizza------------------------------------------------------------------------
    public function deletePizza($id)
    {
        $data = Pizza::where('pizza_id', $id)->first();
        $dataFile = $data['image'];
        Pizza::where('pizza_id', $id)->delete();
        //Delete From Project-- Image
        if (File::exists(public_path() . '/images/' . $dataFile)) {
            File::delete(public_path() . '/images/' . $dataFile);
        }
        return back()->with(['Successfully Delete' => 'Delete Success']);
    }

    //direct to edit Pizza Page -------------------------------------------------------
    public function editPizza($id)
    {
        $data = Pizza::select('pizzas.*', 'categories.*') //select all from two table
            ->join('categories', 'pizzas.category_id', '=', 'categories.category_id') //join two table using foregin key
            ->where('pizza_id', $id)
            ->first();
        // dd($data->toArray());
        $categoryData = Category::get();
        return view('admin.pizza.editPizza')->with(['editPizza' => $data, 'category' => $categoryData]);
    }

    //update Pizza Edit Info
    public function updatePizza(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'publish' => 'required',
            'category' => 'required',
            'discount' => 'required',
            'buyOneGetOne' => 'required',
            'time' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $updateData = $this->requestUpdatePizzaData($request);

        if (isset($updateData['image'])) {
            $data = Pizza::where('pizza_id', $id)->first();
            $dataFile = $data['image'];
            if (File::exists(public_path() . '/images/' . $dataFile)) {
                File::delete(public_path() . '/images/' . $dataFile);
            }
            $file = $updateData['image'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/images', $fileName);
            $updateData['image'] = $fileName;
        }
        Pizza::where('pizza_id', $id)->update($updateData);
        return redirect()->route('admin#pizza')->with(['updateSuccess' => 'Update Successfully']);

    }
    private function requestUpdatePizzaData($request)
    {
        $arr = [
            'pizza_name' => $request->name,
            'price' => $request->price,
            'publish_status' => $request->publish,
            'category_id' => $request->category,
            'discount_price' => $request->discount,
            'buy_one_get_one_status' => $request->buyOneGetOne,
            'waiting_time' => $request->time,
            'description' => $request->description,
        ];
        if ($request->image != null) {
            $arr['image'] = $request->image;
        }
        return $arr;
    }

    //Search Pizza List
    public function searchPizza(Request $request)
    {

        $data = Pizza::where('pizza_name', 'like', '%' . $request->tableSearch . '%')->paginate(5);
        $data->appends($request->all());
        $data1 = Pizza::first();
        $categoryData = Category::get();
        return view('admin.pizza.pizza_list')->with(['pizza' => $data, 'pizza1' => $data1, 'category' => $categoryData]);
    }
}