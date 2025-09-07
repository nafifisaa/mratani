@extends('layouts.dashboard')

@section('title', 'Product Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Product Details</h1>
            <div class="flex space-x-2">
                <a href="{{ route('dashboard.products.edit', $product) }}" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    Edit Product
                </a>
                <a href="{{ route('dashboard.products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Back to Products
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-lg">
                @else
                    <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-500">No image available</span>
                    </div>
                @endif
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Product Information</h3>
                    <div class="space-y-2">
                        <div>
                            <span class="font-medium text-gray-700">Name:</span>
                            <span class="text-gray-900">{{ $product->name }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Category:</span>
                            <span class="text-gray-900">{{ $product->category }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Featured:</span>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $product->is_featured ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $product->is_featured ? 'Yes' : 'No' }}
                            </span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Sort Order:</span>
                            <span class="text-gray-900">{{ $product->sort_order }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Created:</span>
                            <span class="text-gray-900">{{ $product->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Description</h3>
            <div class="prose max-w-none">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>

        @if($product->features && count($product->features) > 0)
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Features</h3>
            <ul class="list-disc list-inside space-y-1">
                @foreach($product->features as $feature)
                    <li class="text-gray-700">{{ $feature }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    Last updated: {{ $product->updated_at->format('M d, Y \a\t g:i A') }}
                </div>
                <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this product?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
