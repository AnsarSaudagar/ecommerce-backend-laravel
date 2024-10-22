<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        // $products = Products::orderBy("id","desc")->paginate(10);
        $allProducts = Products::all();
        return response()->json($allProducts);
    }

    public function product($id){
        $product = Products::find($id);
        return response()->json($product);
    }

    public function productsByCategory($category_id){
        $products = Products::where("category_id",$category_id)->get(); 
        return response()->json($products);
    }


}
