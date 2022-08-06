<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;

    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->paginate(5);
        return view('products.index', $data);
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'promotional_price' => 'required',
            'category_id' => 'required',
            'in_promotion' => 'required',
            'active' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->promotional_price = $request->promotional_price;
        $product->category_id = $request->category_id;
        $product->in_promotion = $request->in_promotion;
        $product->active = $request->active;

        $this->product = $product;

        $this->formatMoney();

        $product->save();

        return redirect()->route('products.index')
            ->with('success','Product has been created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'promotional_price' => 'required',
            'category_id' => 'required',
            'in_promotion' => 'required',
            'active' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = str_replace('R$ ', '', $request->price);
        $product->image = $request->image;
        $product->description = $request->description;
        $product->promotional_price = str_replace('R$ ', '', $request->promotional_price);
        $product->category_id = $request->category_id;
        $product->in_promotion = $request->in_promotion;
        $product->active = $request->active;
        $product->save();

        return redirect()->route('products.index')
            ->with('success','Product Has Been updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Product has been deleted successfully');
    }

    private function formatMoney()
    {
        $this->product->price = str_replace('R$ ', '', str_replace(',', '.', $this->product->price));
        $this->product->promotional_price = str_replace('R$ ', '', str_replace(',', '.', $this->product->promotional_price));
    }
}
