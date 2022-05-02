<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{



    //Direct admin CarrierList-------------------------------------------------------------------
    public function carrier()
    {
        return view('admin.carrier.carrier_list');
    }

    //Direct admin Category-------------------------------------------------------------------
    public function category()
    {

        $data = Category::select('categories.*', DB::raw('count(pizzas.category_id) as count'))
            ->leftJoin('pizzas', 'pizzas.category_id', '=', 'categories.category_id')
            ->groupBy('categories.category_id')
            ->paginate(5);
        return view('admin.category.category_list')->with(['category_list' => $data]);
    }
    //Delete Category----------------------------------------------------------------------------
    public function deleteCategory($id)
    {
        Category::where('category_id', $id)->delete();
        return back()->with(['SuccessFully Delete' => 'Delete Succeess']);
    }
    //edit Category ---------------------------------------------------------------------------
    public function editCategory($id)
    {
        $categoryEdit = Category::where('category_id', $id)->first();
        // dd($categoryEdit['category_name']);
        return view('admin.category.edit_category')->with(['edit' => $categoryEdit]);

    }
    //update Category---------------------------------------------------------------------------
    public function updateCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();}
        $updateData = [
            'category_name' => $request->name,
        ];
        // dd($request->name);
        // dd($updateData['category_name']);
        Category::where('category_id', $request->id)->update($updateData);
        return redirect()->route('admin#category')->with(['updateSuccess' => 'Successful Updated!']);

    }
    //Direct admin addCategory-------------------------------------------------------------------
    public function addCategory()
    {
        return view('admin.category.add_category');
    }
    //create Category--------------------------------------------------------------------------
    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();}
        $data = [
            'category_name' => $request->name,
        ];
        // dd($request->name);
        // dd($data['category_name']);
        Category::create($data);
        return redirect()->route('admin#category')->with(['success' => 'Successful']);
    }
    //search Category----------------------------------------------------------------------------
    public function searchCategory(Request $request)
    {
        $searchDataFormAutoComplete = $request->all()['search'];
        $searchDataFormForm= $request->all()['tableSearch'];
        if(strlen($searchDataFormAutoComplete) >= strlen($searchDataFormForm)){
            if($request->all()['search']!= null){
                $data = Category::where('category_name', 'like', '%' . $request->search . '%')->paginate(5);
                $data->appends($request->all());
                $data1 = count($data);

                }else{
                $data = Category::where('category_name', 'like', '%' . $request->tableSearch . '%')->paginate(5);
                $data1 = 0;
                }
            // dd($data1,$data);
                return view('admin.category.category_list')->with(['category_list'=>$data,'category1'=>$data1]);
        }else{
             if($request->all()['tableSearch']!= null){

            $data = Category::where('category_name', 'like', '%' . $request->tableSearch . '%')->paginate(5);
            $data->appends($request->all());
            $data1 = count($data);

            }else{

            $data = Category::where('category_name', 'like', '%' . $request->tableSearch . '%')->paginate(5);
            $data1 = 0;

            }
        // dd($data1,$data);
            return view('admin.category.category_list')->with(['category_list'=>$data,'category1'=>$data1]);
        }

    }

    //Category Item
    public function categoryItem($id)
    {
        $data = Pizza::where('category_id', $id)->paginate(5);
        $categoryName = Category::where('category_id', $id)->first();
        return view('admin.category.category_item')->with(['pizza' => $data, 'categoryName' => $categoryName]);
    }

}
