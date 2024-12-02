@extends('layouts.app')

@section('content')


<section class="relative bg-cover bg-center h-screen" style="background-image: url('/images/background3.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex justify-center items-center">
        <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold text-center px-6 sm:px-12">
           Make your OWN Beauty.
        </h1>
    </div>
</section>

    <section class="bg-white py-8">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-8">
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">FEATURED</a>
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SKIN</a>
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">LIP+CHEEK</a>
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SETS</a>
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">AWARD WINNERS</a>
                <a href="#" class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SHOP ALL</a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-pink-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">About Us</h2>
            <p class="mt-4 text-gray-600 px-6 sm:px-12">
                We believe in glowing naturally. Our skincare and beauty products are carefully crafted with cruelty-free, natural ingredients to bring out the best in you. Whether you're looking for skincare or lip products, we have everything you need to feel beautiful and confident every day.
            </p>
            <a href="#" class="mt-6 inline-block px-6 py-3 bg-pink-600 text-white font-medium rounded-lg hover:bg-pink-700 transition duration-300">Learn More</a>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Featured Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <img src="https://via.placeholder.com/300" alt="Product 1" class="w-full h-48 object-cover rounded-md">
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Natural Glow Serum</h3>
                    <p class="mt-2 text-pink-600 font-semibold">$29.99</p>
                    <button class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                        Add to Cart
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <img src="https://via.placeholder.com/300" alt="Product 2" class="w-full h-48 object-cover rounded-md">
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Hydrating Face Cream</h3>
                    <p class="mt-2 text-pink-600 font-semibold">$19.99</p>
                    <button class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                        Add to Cart
                    </button>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <img src="https://via.placeholder.com/300" alt="Product 3" class="w-full h-48 object-cover rounded-md">
                    <h3 class="mt-4 text-lg font-medium text-gray-700">Radiance Face Mask</h3>
                    <p class="mt-2 text-pink-600 font-semibold">$24.99</p>
                    <button class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
