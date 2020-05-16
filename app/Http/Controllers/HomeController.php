<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\category;
use App\subcategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$products = products::where('status','active')->get();
        $category = category::where('status','active')->get();
       // dd($category);
        return view('home')->with(['category'=>$category]);
    }
    public function SubCategoryDetails()
    {
         $subcat = subcategory::where('category_id',$_POST['cat'])->get();
         echo "<option value='0'>Select Subcategory</option>";
         foreach ($subcat as $key) {
            echo "<option value=".$key->id.">".$key->subcategory_name."</option>";
         }
    }
    public function ProductDetails()
    {
        $products = products::where('category_id',$_POST['cat'])->where('subcategory_id',$_POST['subcat'])->get();
         echo "<option value='0'>Select Products</option>";
         foreach ($products as $key) {
            echo "<option value=".$key->id.">".$key->product_name."</option>";
         }
    }
    public function cartDetails()
    {
        $product_id = $_POST['product_name'];
        $products = products::where('id',$product_id)->pluck('product_name');
        return view('cart')->with('product_name',$products);
    }
}
