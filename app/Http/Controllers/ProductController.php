<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();

        if ($products) {
            return response()->json([
                'error' => false,
                'message' => 'Products found',
                'data' => $products,
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Products Not found',
                'data' => $products,
            ], 404);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'error' => false,
                'message' => 'Product found',
                'data' => $product,
            ]);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Product not found',
            ]);
        }
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $stock = $request->input('stock');

        $product = Product::create([
            'name'  => $name,
            'desc'  => $desc,
            'price' => $price,
            'stock' => $stock
        ]);

        if ($product) {
            return response()->json([
                'error' => false,
                'message' => 'Product created successfully!',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Product failed to create!',
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $desc = $request->input('desc');
        $price = $request->input('price');
        $stock = $request->input('stock');

        $product = Product::where('id', $id)->update([
            'name'  => $name,
            'desc'  => $desc,
            'price' => $price,
            'stock' => $stock
        ]);

        if ($product) {
            return response()->json([
                'error' => false,
                'message' => 'Product updated successfully!',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Product failed to update!',
            ], 400);
        }
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->delete();

        if ($product) {
            return response()->json([
                'error' => false,
                'message' => 'Product deleted successfully!',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Product failed to delete!',
            ], 400);
        }
    }

    //
}
