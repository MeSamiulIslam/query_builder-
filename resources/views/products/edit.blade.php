@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Product</h1>

        <div class="bg-white shadow-md rounded-lg p-8 max-w-lg mx-auto">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="product_id" class="block text-gray-700 font-medium mb-2">Product ID</label>
                    <input type="text" name="product_id" id="product_id" value="{{ $product->product_id }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $product->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                    <input type="number" name="price" id="price" value="{{ $product->price }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        step="0.01" required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-gray-700 font-medium mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ $product->stock }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-medium mb-2">Product Image</label>
                    <input type="file" name="image" id="image"
                        class="w-full text-gray-700 px-3 py-2 border border-gray-300 rounded focus:outline-none"
                        onchange="previewImage(event)">
                </div>

                @if ($product->image)
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Current Image:</label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image"
                            class="w-32 h-32 object-cover mb-4">
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">New Image Preview:</label>
                    <img id="new-image-preview" class="w-32 h-32 object-cover mb-4" style="display: none;">
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('new-image-preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        }
    </script>
@endsection
