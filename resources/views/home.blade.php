@extends('layouts.app')

@section('content')
    <div class="bg-gray-100">
        <section class="relative w-full h-[60vh] bg-cover bg-center"
            style="background-image: url('https://via.placeholder.com/1200x800');">
            <div class="absolute inset-0 bg-black/20 flex justify-center items-center">
                <h1 class="text-white text-3xl md:text-5xl font-bold text-center">
                    One of EVERYTHING really GOOD.
                </h1>
            </div>
        </section>

        <section class="flex justify-center flex-wrap gap-4 py-8 bg-white">
            <button type="button" class="px-6 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200">
                FEATURED
            </button>
            <button type="button" class="px-6 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200">
                SKIN
            </button>
            <button type="button" class="px-6 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200">
                LIP+CHEEK
            </button>
            <a href="{{ url('/productpage') }}" class="px-6 py-2 bg-gray-100 rounded-md text-gray-700 hover:bg-gray-200">
                SHOP ALL
            </a>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800">About Rhode</h2>
                <p class="mt-4 text-gray-600">
                    At Rhode, we believe in creating skincare products that are natural, cruelty-free, and tailored to
                    enhance your beauty. Join us on our journey to redefine self-care with products designed with you in
                    mind.
                </p>
                <a href="{{ url('/about') }}" class="inline-flex items-center justify-center mt-6 px-6 py-3 bg-pink-600 text-white font-medium rounded-lg shadow hover:bg-pink-700">
                    Learn More
                </a>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800">Featured Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                    <div class="bg-white rounded-lg shadow p-6">
                        <img src="https://via.placeholder.com/300" alt="Product 1" class="w-full h-48 object-cover rounded-md">
                        <h3 class="mt-4 text-lg font-medium text-gray-700">Natural Glow Serum</h3>
                        <p class="mt-2 text-pink-600 font-semibold">$29.99</p>
                        <button type="button" class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                            Add to Cart
                        </button>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <img src="https://via.placeholder.com/300" alt="Product 2" class="w-full h-48 object-cover rounded-md">
                        <h3 class="mt-4 text-lg font-medium text-gray-700">Hydrating Face Cream</h3>
                        <p class="mt-2 text-pink-600 font-semibold">$19.99</p>
                        <button type="button" class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                            Add to Cart
                        </button>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <img src="https://via.placeholder.com/300" alt="Product 3" class="w-full h-48 object-cover rounded-md">
                        <h3 class="mt-4 text-lg font-medium text-gray-700">Radiance Face Mask</h3>
                        <p class="mt-2 text-pink-600 font-semibold">$24.99</p>
                        <button type="button" class="mt-4 px-4 py-2 bg-pink-600 text-white rounded-lg hover:bg-pink-700">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-900">
            <div class="container mx-auto px-6 text-center text-white">
                <h2 class="text-3xl font-bold">Join Our Community</h2>
                <p class="mt-4">
                    Subscribe to our newsletter for the latest updates on products, discounts, and skincare tips.
                </p>
                <form class="mt-6 flex flex-col sm:flex-row justify-center gap-2">
                    <input type="email" placeholder="Enter your email" class="px-4 py-2 rounded sm:rounded-l-lg w-full sm:w-1/3 text-gray-900">
                    <button type="submit" class="px-6 py-2 bg-pink-600 text-white font-medium rounded sm:rounded-r-lg hover:bg-pink-700">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection
