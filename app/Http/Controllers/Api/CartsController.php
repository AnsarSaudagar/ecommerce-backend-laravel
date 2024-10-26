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
        $selected_values = ["products.id", "products.name", "products.price", "products.photo", "products.description", "carts.count", "carts.id as cart_id"];

        $user_cart = Carts::select($selected_values)
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->where([
                'user_id' => $user_id,
                'status' => Carts::STATUS_ACTIVE
            ])->get();

        return response()->json($user_cart);
    }

    /**
     * Summary of getUserActiveCartCategoryWise
     * @param mixed $user_id Logged in user id
     * @param mixed $category_id Category of Product
     * @return mixed|\Illuminate\Http\JsonResponse
     * 
     * @return mixed Array of carts
     * 
     * Getting the carts of products category wise
     */
    public function getUserActiveCartCategoryWise($user_id, $category_id)
    {
        $user_cart_category = Carts::select('carts.product_id')
            ->leftJoin('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', $user_id)
            ->where('products.category_id', $category_id)
            ->get();
        return response()->json($user_cart_category);
    }


    /**
     * Summary of deleteCartForSpecificProduct
     * @param mixed $user_id
     * @param mixed $product_id
     * @return mixed|\Illuminate\Http\JsonResponse
     * 
     * Deleting a single product from the cart
     */
    public function deleteCartForSpecificProduct($user_id, $product_id)
    {
        try {
            Carts::where([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'status' => Carts::STATUS_ACTIVE
            ])->delete();
            return response()->json(['message' => 'Cart Product deleted successfully'], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'An error occurred while deleting the product cart.',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * Summary of emptyCartUser
     * @param mixed $user_id
     * @return mixed|\Illuminate\Http\JsonResponse
     * 
     * Deleting all the cart products
     */
    public function emptyCartUser($user_id)
    {
        try {
            Carts::where([
                'user_id' => $user_id,
                'status' => Carts::STATUS_ACTIVE
            ])->delete();

            return response()->json(['message' => 'Full Cart deleted successfully'], 201);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'An error occurred while deleting all the cart.',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function updateCartCount(Request $request, $cart_id){
        try {
            $cart = Carts::find($cart_id);
            $cart->count += $request->count;
            $cart->save();
            return response()->json(['message' => 'Cart Count updated successfully'], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'An error occurred while updating the count.',
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
