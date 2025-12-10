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

    public function showproducts(){
        // with category relationship
        $products = Product::with('category')->get();
        return view('admin.show_products', compact('products'));
    }

    public function editProductView($id){
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.edit_product', compact('product', 'categories'));
    }

    public function updateproduct(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category;

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('product_images/' . $product->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('product_images'), $filename);
            $product->image_path = $filename; 
        }

        if ($product->save()) {
            return redirect()->route('showproducts')->with('success', 'Product updated successfully.');
        }
        else {

        return redirect()->back()->with('error', 'Product not updated.');
        }
    }

    public function deleteproduct($id){
        $product = Product::find($id);
        if ($product) {
            $oldImagePath = public_path('product_images/' . $product->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $product->delete();
            return redirect()->route('showproducts')->with('success', 'Product deleted successfully.');
        }
        return redirect()->route('showproducts')->with('error', 'Product not found.');
    }
} 