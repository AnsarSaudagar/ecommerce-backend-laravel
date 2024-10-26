<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        $carts = Carts::all();

        return response()->json($carts);
    }

    /**
     * Summary of addProductToUserCart
     * 
     * Adding the product to cart
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function addProductToUserCart(Request $request)
    {
        $product_cart = Carts::create($request->all());
        return response()->json($product_cart);
    }

    /**
     * Summary of getUserCart
     * 
     * Getting the active products of the users 
     * @param mixed $user_id
     * @return mixed|\Illuminate\Http\JsonResponse
     * 
     */
    public function getUserActiveCart($user_id)
    {
        $user_cart = Carts::where([
            'user_id' => $user_id,
            'status' => Carts::STATUS_ACTIVE
        ])->get();

        return response()->json($user_cart);
    }

    public function getUserActiveCartCategoryWise($user_id, $category_id)
    {
        $user_cart_category = Carts::select('carts.*', 'products.*')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', $user_id)
            ->where('products.category_id', $category_id)
            ->get();
        return response()->json($user_cart_category);
    }
}
