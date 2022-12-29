<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public static function getProduct()
    {
        $products = product::all();
        return response($products,200);
    }
    public static function addProduct()
    {
        $validator = Validator::make(request()->all(), [
            'product_code' => 'required|unique:products|max:255',
            'product_name' => 'required|max:100',
            'uom_id' => 'required|exists:uoms,id',
            'unit_price' => 'required|numeric',
            'description' => 'required',
        ]);
        if($validator->fails())
        {
            return $validator->errors();
        }
        $product = new product();
        $product->product_code = request("product_code", "");
        $product->product_name = request("product_name", "");
        $product->uom_id = request("uom_id", "");
        $product->description = request("description", "");
        $product->unit_price = request("unit_price", "");
        $product->save();
        return response($product,200);
    }
    public static function editProduct($id)
    {
        $product = product::find($id);
        return response($product,200);
    }
    public static function updateProduct($id)
    {
        $validator = Validator::make(request()->all(), [
            'product_code' => 'required|unique:products|max:255',
            'product_name' => 'required|max:100',
            'uom_id' => 'required|exists:uoms,id',
            'unit_price' => 'required|numeric',
            'description' => 'required',
        ]);
        if($validator->fails())
        {
            return $validator->errors();
        }
        $product = new product();
        $product->product_code = request("product_code", "");
        $product->product_name = request("product_name", "");
        $product->uom_id = request("uom_id", "");
        $product->description = request("description", "");
        $product->unit_price = request("unit_price", "");
        $product->save();
        return response($product,200);
    }
    public static function deleteProduct($id)
    {
        $uom = product::find($id);
        $uom->delete();
        return response()->json(["message"=>"data berhasil dihapus"],200);
    }
}
