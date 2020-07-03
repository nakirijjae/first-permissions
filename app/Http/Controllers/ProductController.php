<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Gate;


class ProductController extends Controller
{
    /**
     * @return Response
     */

    public function index()
    {
      $products = Product::all()->sortBy('code');
      if((Gate::inspect('edit-products'))->allowed()){
        return view('products', ['products' => $products]);
      }else{
        return view('products_list', ['products' => $products]);
      }
    }

    public function create()
    {
      Gate::authorize('create-product');

      return view('product_new');
    }

    public function store(Request $request)
    {
      //Create a new product
      $product = new Product;
      $product->code = $request->code;
      $product->category = $request->category;
      $product->amount = $request->cost;
      $product->min_qty = $request->min_qty;
      $product->description = $request->description;
      $product->save();

      return redirect('/products');
    }

    public function show($id)
    {
      Gate::authorize('view-product', $id);

      $product = Product::findOrFail($id);

      return view('product_view', ['product' => $product]);
    }

    public function edit($id)
    {
      Gate::authorize('edit-product', $id);

      $product = Product::findOrFail($id);

      return view('product_edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
      Gate::authorize('update-product', $id);

      $product = Product::findOrFail($id);
      $product->code = $request->code;
      $product->category = $request->category;
      $product->amount = $request->cost;
      $product->min_qty = $request->min_qty;
      $product->description = $request->description;
      $product->update();

      return redirect('/products');
    }

    public function destroy($id)
    {
      Gate::authorize('delete-product', $id);

      $product = Product::findOrFail($id);
      $product->delete();

      return redirect('/products');
    }
}
