@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <!-- Quick View Button to Trigger Modal -->
        <div x-data="{ open: true }">

            <div x-show="open" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">

                <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg relative"
                    style="height: auto; max-height: 80vh; overflow-y: auto;">

                    <button onclick="window.location.href='{{ route('products.index') }}'"
                        class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="w-full max-w-sm mx-auto mb-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-auto rounded-md object-contain">
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">{{ $product->name }}</h2>

                    <p class="text-gray-700 mb-4 text-center">{{ $product->description }}</p>

                    <p class="text-xl font-bold text-gray-900 mb-4 text-center">Tk. {{ number_format($product->price, 2) }}
                    </p>

                    <button onclick="window.location.href='{{ route('products.index') }}'"
                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 w-full text-center">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
