<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        $products = Product::orderBy('created_at', 'desc')
                            ->filter(request()->all())
                            ->latest('id')->get()->take(12);

        return view('welcome', compact('products', 'categories'));



    }
}
