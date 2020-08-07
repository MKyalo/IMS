<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Supplier;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products=Product::all();
        $suppliers=Supplier::all();
        //return ('controller.view', compact('users','projects','foods'));
    return view ('products.index',compact('products','categories','suppliers'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $arr['category']=Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
       $product->serial_no=$request->serial_no;
       $product->product_name=$request->product_name;
       $product->description=$request->description;
       $product->purchase_price=$request->purchase_price;
       $product->retail_price=$request->retail_price;
       $product->purchase_date=$request->purchase_date;
       $product->quantity=$request->quantity;

       $product->category_id=$request->category_id;
       $product->supplier_id=$request->supplier_id;
       $product->save();
       return redirect()->back()->with('success','Product added successfully');
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
       $product->serial_no=$request->serial_no;
       $product->product_name=$request->product_name;
       $product->description=$request->description;
       $product->purchase_price=$request->purchase_price;
       $product->retail_price=$request->retail_price;
       $product->purchase_date=$request->purchase_date;
       $product->quantity=$request->quantity;

       $product->category_id=$request->category_id;
       $product->supplier_id=$request->supplier_id;
       $product->save();
       return redirect()->back()->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Product::destroy($id);
        return redirect()->back()->with('warning','Prouct Deleted Successfully!');
    }
}
