@extends('layouts.dashboard')

@section('title', 'Dashboard - MRATANI')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-2 bg-green-100 rounded-lg">
                <i class="fas fa-seedling text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Products</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $productsCount }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg">
                <i class="fas fa-newspaper text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Articles</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $articlesCount }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-2 bg-yellow-100 rounded-lg">
                <i class="fas fa-star text-yellow-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Featured Products</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $featuredProductsCount }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-2 bg-purple-100 rounded-lg">
                <i class="fas fa-eye text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Published Articles</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $publishedArticlesCount }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Products -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Recent Products</h3>
                <a href="{{ route('dashboard.products.index') }}" class="text-green-600 hover:text-green-500 text-sm font-medium">
                    View all
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentProducts->count() > 0)
                <div class="space-y-4">
                    @foreach($recentProducts as $product)
                    <div class="flex items-center space-x-4">
                        <img 
                            src="{{ Str::startsWith($product->image, 'products/') ? asset('storage/' . $product->image) : asset($product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $product->name }}</p>
                            <p class="text-sm text-gray-500">{{ $product->category }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($product->is_featured)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Featured
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-4">No products yet</p>
            @endif
        </div>
    </div>

    <!-- Recent Articles -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Recent Articles</h3>
                <a href="{{ route('dashboard.articles.index') }}" class="text-green-600 hover:text-green-500 text-sm font-medium">
                    View all
                </a>
            </div>
        </div>
        <div class="p-6">
            @if($recentArticles->count() > 0)
                <div class="space-y-4">
                    @foreach($recentArticles as $article)
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-newspaper text-blue-600"></i>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900">{{ $article->title }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ Str::limit($article->excerpt, 60) }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($article->is_published)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Published
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    Draft
                                </span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-4">No articles yet</p>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('dashboard.products.create') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-plus text-green-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Add Product</p>
                    <p class="text-xs text-gray-500">Create new product</p>
                </div>
            </div>
        </a>

        <a href="{{ route('dashboard.articles.create') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-plus text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Add Article</p>
                    <p class="text-xs text-gray-500">Create new article</p>
                </div>
            </div>
        </a>

        <a href="{{ route('dashboard.products.index') }}" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <i class="fas fa-edit text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Manage Products</p>
                    <p class="text-xs text-gray-500">Edit existing products</p>
                </div>
            </div>
        </a>

        <a href="{{ route('home') }}" target="_blank" class="bg-white p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-external-link-alt text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">View Website</p>
                    <p class="text-xs text-gray-500">See live website</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
