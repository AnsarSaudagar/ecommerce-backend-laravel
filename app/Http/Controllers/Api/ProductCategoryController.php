<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(){
        $categories = ProductsCategory::all();
        return response()->json($categories);
    }

    public function store(Request $request){
        $category = ProductsCategory::create($request->all());
        return response()->json($category);
    }
}
