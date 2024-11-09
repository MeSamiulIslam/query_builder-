@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">

        <div class="flex justify-between items-center mb-4">
            <form method="GET" action="{{ route('products.index') }}" class="flex space-x-2">
                <input type="text" name="search" placeholder="Search by ID or Description"
                    class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
            </form>

            <form method="GET" action="{{ route('products.index') }}" class="flex space-x-2">
                <select name="sort" class="border border-gray-300 rounded px-4 py-2">
                    <option value="name">Sort by Name</option>
                    <option value="price">Sort by Price</option>
                </select>
                <select name="direction" class="border border-gray-300 rounded px-4 py-2">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Sort</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow-md rounded-lg p-4 relative">
                    <!-- Product Image -->
                    <div class="w-full h-48 mb-4 overflow-hidden rounded-md">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'placeholder-image-url.jpg' }}"
                            alt="{{ $product->name }}" class="object-cover w-full h-full">
                    </div>

                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 80) }}</p>

                    <p class="text-xl font-bold text-gray-900 mb-4">Tk. {{ number_format($product->price, 2) }}</p>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('products.show', $product->id) }}" class="text-green-600 font-semibold">Quick
                            View</a>
                        <div class="space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="text-blue-500 font-semibold">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 font-semibold">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
@endsection
