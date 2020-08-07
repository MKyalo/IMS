<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
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
        $suppliers = Supplier::all();

        return view('suppliers.index')->with('suppliers',$suppliers);
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
    public function store(Request $request, Supplier $supplier)
    {

            $supplier -> supplier_name = $request->supplier_name;
            $supplier ->  email= $request->email;
            $supplier-> phone_number = $request->phone_number;
            $supplier-> address = $request->address;
            $supplier-> location= $request->location;
            $supplier->save();
        return redirect()->route('suppliers.index')->with('success','Supplier Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier -> supplier_name = $request->supplier_name;
            $supplier ->  email= $request->email;
            $supplier-> phone_number = $request->phone_number;
            $supplier-> address = $request->address;
            $supplier-> location= $request->location;
            $supplier->save();
        return redirect()->route('suppliers.index')->with('success','Supplier Information Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->back()->with('warning','Supplier Information Deleted Successfully!');
    }
}
