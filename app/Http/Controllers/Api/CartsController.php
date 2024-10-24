<?php 
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller{
    public function index(){
        $carts = Carts::all();

        return response()->json($carts);
    }

    public function addProductToUserCart(Request $request){
        $product_cart = Carts::create($request->all());
        return response()->json($product_cart);

    }

    public function getUserCart($user_id){
        $user_cart = Carts::where(['user_id' => $user_id])->get();

        return response()->json($user_cart);
    }
}