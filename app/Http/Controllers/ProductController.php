<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
       return view('products.index', [
            'products'=> Product::get()
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required'
    ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('product created');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit', ['product' => $product]);
        
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'description'=>'required'
    ]);

    $product = Product::where('id',$id)->first();
       
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->withSuccess('product updated');
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('product deleted');
    }

    public function show($id){
        $product = Product::where('id',$id)->first();
        
        return view('products.show', ['product'=> $product]);
    }
}
