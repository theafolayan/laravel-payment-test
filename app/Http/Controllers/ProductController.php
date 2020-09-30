<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');   // # code...
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // shows all products in the database
        return view('products.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'image' => 'mimes:jpeg,png|max:4014',
                    'price'=> 'numeric',
                    'quantity'=> 'numeric',
                    'description'=> 'min:5|max:2000'
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public', $validated['name'].".".$extension);
                $image_url = Storage::url($validated['name'].".".$extension);
                $product = Product::create([
                   'name' => $validated['name'],
                    'image' => $image_url,
                    'price'=> $request->price,
                    'quantity'=> $request->quantity,
                    'description' => $request->description
                ]);
                Session::flash('success', "Success!");
                return redirect()->back();
            }
        }
        abort(500, 'Could not upload image :(');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
