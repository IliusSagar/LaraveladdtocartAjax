<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Response;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
{
    $product = DB::table('products')->where('id', $id)->first();
    $data = array();

    if ($request->input('action') === 'add_to_cart') {
     
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->price;
            $data['weight'] = 1;
            // $data['options']['image'] = $product->image_one;
            // $data['options']['color'] = $request->color;
            // $data['options']['size'] = $request->size;
            Cart::add($data);

            return \Response::json(['success' => 'Successfully Added on your Cart!']);

            // return response()->json(['success' => 'Successfully Added on your Cart!']);

            // return redirect()->back()->with('success', 'Product Added Successfully!');
       
    
    }
}

public function allCart(Request $request, $id)
{
    $product = DB::table('products')->where('id', $id)->first();
    $data = array();

    if ($request->input('action') === 'add_to_cart') {
     
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->price;
            $data['weight'] = 1;
            // $data['options']['image'] = $product->image_one;
            // $data['options']['color'] = $request->color;
            // $data['options']['size'] = $request->size;
            Cart::add($data);

            return \Response::json(['success' => 'Successfully Added on your Cart!']);

            // return response()->json(['success' => 'Successfully Added on your Cart!']);

            // return redirect()->back()->with('success', 'Product Added Successfully!');
       
    
    }
}

}
