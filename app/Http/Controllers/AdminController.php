<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function addproductview()
    {
        $categorydata = Category::all();
        return view('admin.add_product', compact('categorydata'));
    }

    public function addCategory(Request $request)
    {
        Category::create([
            'name' => $request->category_name,
        ]);


        return redirect()->back();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function addproduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;




        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('product_images'), $filename);
            $product->image_path = $filename; 
        }

        if ($product->save()) {
            return redirect()->back()->with('success', 'Product added successfully.');
        }

        return redirect()->back()->with('error', 'Product not added.');

    }
} 