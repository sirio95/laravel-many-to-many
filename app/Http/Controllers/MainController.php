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

}