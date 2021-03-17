<?php

namespace App\Http\Controllers;

use App\Models\Counteragent;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Product::all();
        return view('admin/products',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vendors = Counteragent::all();
        return view('admin/productsadd',['vendors' => $vendors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product();
        $product->name = $request->productName;
        $product->vendor = $request->productVendor;
        $product->save();
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)
    {
        //
        $id = $request->id;
        $post = DB::table('products')->where('id', $id)->first();
        $vendors = Counteragent::all();
        return view('admin/productdetail',['post' => $post,'vendors'=>$vendors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        DB::table('products')
            ->where('id', $id)
            ->update([ 'name' => $request->productName,
                'vendor' => $request->productVendor]);
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product,Request $request)
    {
        //
        $id = $request->id;

        $article = Product::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('products');
    }
}
