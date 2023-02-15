<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Typology;

class MainController extends Controller
{
    public function home()
    {
        $categories = Category::all();

        return view('pages.home', compact('categories'));
    }
    public function products()
    {

        $products = Product::all();

        return view('pages.product.home', compact('products'));
    }

    public function create_new()
    {

        $typologies = Typology::all();
        $categories = Category::all();

        return view('pages.products.create-new',
            compact('categories', 'typologies')
        );
    }
    public function product_store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);
        $code = rand(10000, 99999);
        $data['code'] = $code;

        $product = Product::make($data);
        $typology = Typology::find($data['typology_id']);

        $product->typology()->associate($typology);
        $product->save();

        $categories = Category::find($data['categories']);
        $product->categories()->attach($categories);

        return redirect()->route('home');
    }
    public function product_edit(Product $product)
    {

        $typologies = Typology::all();
        $categories = Category::all();

        return view('pages.product.edit',
            compact('product',
                'typologies',
                'categories')
        );
    }
    public function product_update(Request $request, Product $product)
    {

        $data = $request->validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $product->update($data);
        $typology = Typology::find($data['typology_id']);

        $product->typology()->associate($typology);
        $product->save();

        $categories = Category::find($data['categories']);
        $product->categories()->sync($categories);

        return redirect()->route('home');
    }

    public function product_delete(Product $product)
    {

        $product->categories()->sync([]);
        $product->delete();

        return redirect()->route('home');
    }

}