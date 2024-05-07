<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // $idproduct = Product::orderBy('name','desc')->get(); works
        // $idproduct = Product::where('idproduct','=','super')->get(); just as test im sure it works


        $idproduct = $request->query('idproduct'); // Extract idproduct from the query parameters


        $product = Product::where('idproduct', $idproduct)->first();

        if (!$product) {
            return 'no id found';
        }

        return $product;
    }
    public function show_table()
    {
        return Product::paginate(10);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idproduct = $request->input('idproduct'); // Extract idproduct from the request data

        $data = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        $product = Product::where('idproduct', $idproduct)->first();

        // updating based on multiple filters

        // $product = Product::where('idproduct', $idproduct)
        //                   ->where('$idproduct2', $idproduct2) // Add a name filter
        //                   ->first();

        if (!$product) {
            return 'No product found with the given id.';
        }

        $product->update($data); // Update product fields using validated data

        return $product;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $idproduct = $request->query('idproduct'); // Extract idproduct from the query parameters
        // $price = $request->query('price'); // Extract price from the query parameters

        $product = Product::where('idproduct', $idproduct)
            // ->where('price', $price)
            ->first();

        if (!$product) {
            return 'No product found matching the given id and price.';
        }

        $product->delete();

        return 'Product deleted successfully.';
    }
}
