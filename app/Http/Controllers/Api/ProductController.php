<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;

    public function get(Request $request)
    {
        if(is_numeric($request->id)) {
            return Product::find($request->id);
        }
        return Product::all();
    }
}
