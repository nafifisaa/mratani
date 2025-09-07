<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::featured()->ordered()->get();
        $articles = Article::published()->ordered()->limit(3)->get();

        return view('home', compact('products', 'articles'));
    }
}
