<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Main::all();
        $products = Product::all();
        return view('admin/orders',['posts' => $posts,'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main,Request $request)
    {
        //
        $id = $request->id;
        $post = DB::table('mains')->where('id', $id)->first();
        $products = Product::all();
        return view('admin/orderdetail',['post' => $post,'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main $main)
    {
        //
        $id = $request->id;
        DB::table('mains')
            ->where('id', $id)
            ->update([ 'PON' => $request->orderPON,
                'supplier' => $request->orderSupplier,
            'product' => $request->orderProduct,
            'quantity' => $request->orderQuantity,
            'payment_status' => $request->orderStatus,
            'destination' => $request->orderDestination,
            'status' => $request->orderStatus2]);
        return redirect()->route('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main, Request $request)
    {
        //
        $id = $request->id;

        $article = Main::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('orders');

    }
}
