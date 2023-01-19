<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'desc')
                            ->filter(request()->all())
                            ->orderBy('id', 'desc')->paginate(4);
                            return view('welcome', compact('products', 'categories'));
    }
}
