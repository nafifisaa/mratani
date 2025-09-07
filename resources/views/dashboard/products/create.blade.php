@extends('layouts.dashboard')

@section('title', 'Add Product - MRATANI')
@section('page-title', 'Add New Product')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('dashboard.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('name') border-red-500 @enderror"
                           placeholder="Enter product name"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <input type="text"
                           id="category"
                           name="category"
                           value="{{ old('category') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('category') border-red-500 @enderror"
                           placeholder="e.g., Varietas Premium"
                           required>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number"
                           id="sort_order"
                           name="sort_order"
                           value="{{ old('sort_order', 0) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('sort_order') border-red-500 @enderror"
                           min="0">
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image *</label>
                    <input type="file"
                           id="image"
                           name="image"
                           accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('image') border-red-500 @enderror"
                           required>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-sm text-gray-500">Upload an image (JPEG, PNG, JPG, GIF, max 2MB)</p>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('description') border-red-500 @enderror"
                              placeholder="Enter product description"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Features -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Features</label>
                    <div id="features-container">
                        @if(old('features'))
                            @foreach(old('features') as $index => $feature)
                            <div class="flex items-center space-x-2 mb-2 feature-row">
                                <input type="text"
                                       name="features[]"
                                       value="{{ $feature }}"
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                       placeholder="Enter feature">
                                <button type="button" class="text-red-600 hover:text-red-800 remove-feature">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endforeach
                        @else
                        <div class="flex items-center space-x-2 mb-2 feature-row">
                            <input type="text"
                                   name="features[]"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                                   placeholder="Enter feature">
                            <button type="button" class="text-red-600 hover:text-red-800 remove-feature">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                    <button type="button" id="add-feature" class="mt-2 text-green-600 hover:text-green-800 text-sm">
                        <i class="fas fa-plus"></i> Add Feature
                    </button>
                </div>

                <!-- Is Featured -->
                <div class="md:col-span-2">
                    <div class="flex items-center">
                        <input type="checkbox"
                               id="is_featured"
                               name="is_featured"
                               value="1"
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                            Featured Product (will appear on homepage)
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('dashboard.products.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Create Product
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const addFeatureBtn = document.getElementById('add-feature');
    const featuresContainer = document.getElementById('features-container');

    addFeatureBtn.addEventListener('click', function() {
        const featureRow = document.createElement('div');
        featureRow.className = 'flex items-center space-x-2 mb-2 feature-row';
        featureRow.innerHTML = `
            <input type="text"
                   name="features[]"
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   placeholder="Enter feature">
            <button type="button" class="text-red-600 hover:text-red-800 remove-feature">
                <i class="fas fa-times"></i>
            </button>
        `;
        featuresContainer.appendChild(featureRow);
    });

    featuresContainer.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature') || e.target.parentElement.classList.contains('remove-feature')) {
            const featureRow = e.target.closest('.feature-row');
            if (featuresContainer.children.length > 1) {
                featureRow.remove();
            }
        }
    });
});
</script>
@endsection
