<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(8)->get();  
        return view('user.index', compact('products'));
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
    } 
    elseif ($sort == 'price-desc') {
        $query->orderBy('price', 'DESC');
    } 
    elseif ($sort == 'latest') {
        $query->latest();
    }

    $products = $query->get();



    return view('user.Allproducts', compact('products'));
    }
}


