@extends('layouts.dashboard')

@section('title', 'Article Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Article Details</h1>
            <div class="flex space-x-2">
                <a href="{{ route('dashboard.articles.edit', $article) }}" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg transition duration-200">
                    Edit Article
                </a>
                <a href="{{ route('dashboard.articles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Back to Articles
                </a>
            </div>
        </div>

        <div class="space-y-6">
            @if($article->image)
            <div>
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded-lg">
            </div>
            @endif

            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h2>

                <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                    <span>Published: {{ $article->created_at->format('M d, Y') }}</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $article->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $article->is_published ? 'Published' : 'Draft' }}
                    </span>
                    <span>Sort Order: {{ $article->sort_order }}</span>
                </div>

                <div class="prose max-w-none mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Excerpt</h3>
                    <p class="text-gray-700 italic">{{ $article->excerpt }}</p>
                </div>

                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Content</h3>
                    <div class="text-gray-700">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-500">
                    Last updated: {{ $article->updated_at->format('M d, Y \a\t g:i A') }}
                </div>
                <form action="{{ route('dashboard.articles.destroy', $article) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this article?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                        Delete Article
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
