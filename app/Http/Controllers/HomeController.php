<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $cartCount = " ";
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');

        }
        $products = Product::latest()->take(8)->get();
        return view('user.index', compact('products', 'cartCount'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function allproducts(Request $request)
    {
        $sort = $request->sort;

        $query = Product::query();

        if ($sort == 'price-asc') {
            $query->orderBy('price', 'ASC');
        } elseif ($sort == 'price-desc') {
            $query->orderBy('price', 'DESC');
        } elseif ($sort == 'latest') {
            $query->latest();
        }

        $products = $query->get();

        
        $cartCount = " ";
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');

        }

        return view('user.Allproducts', compact('products', 'cartCount'));
    }

    public function addToCart(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');

        // Check if the product already exists in the cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // If it exists, increment the quantity
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // If it doesn't exist, create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart(Request $request)
    {

         $cartCount = " ";
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');

        }

        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        return view('user.viewcart', compact('cartCount', 'cartItems'));
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem && $cartItem->user_id == Auth::id()) {
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function checkout(Request $request)
    {
        return view('user.checkout');
    }
}


