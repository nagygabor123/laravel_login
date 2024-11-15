<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $products = Product::create($request->all());
        return response()->json([
            'product' => $products,
        ]);
    }


    public function update(ProductRequest $request,  $id)
    {
        $products= Product::findOrFail($id);
        $products->update($request->all()); 
        return response()->json([
            'product' => $products,
        ]);        
    }


    public function destroy($id)
    {
        $products= Product::findOrFail($id);    
        $products->delete();
        return response()->json([
            'message' => 'A termék törölve.',
            'id'=> $id,
        ]); 
    }
}
