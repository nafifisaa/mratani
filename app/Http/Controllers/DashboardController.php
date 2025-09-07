<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $articlesCount = Article::count();
        $featuredProductsCount = Product::where('is_featured', true)->count();
        $publishedArticlesCount = Article::where('is_published', true)->count();

        $recentProducts = Product::latest()->limit(5)->get();
        $recentArticles = Article::latest()->limit(5)->get();

        return view('dashboard.index', compact(
            'productsCount',
            'articlesCount',
            'featuredProductsCount',
            'publishedArticlesCount',
            'recentProducts',
            'recentArticles'
        ));
    }
}
