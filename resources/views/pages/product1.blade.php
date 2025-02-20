
@extends('layouts.app')

@section('content')


@include('pages.components.header')

<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="/images/rhode_lip.jpg" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Peptide lip tint</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    Meet Lip Tint. Sheer-but-buildable color that melts onto lips for a hint of tint and rich, glossy finish. 
                    The nourishing, fragrance-free formula leaves lips feeling hydrated and visibly plump. Size: 10ml / .3 fl oz.
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Price:</span>
                        <span class="text-gray-600 dark:text-gray-300">₮95'000</span>
                    </div>
                    
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300">Select Color:</span>
                    <div class="flex items-center mt-2">
                        <button class="w-6 h-6 rounded-full bg-pink-600 dark:bg-pink-800 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-red-500 dark:bg-red-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-blue-500 dark:bg-blue-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-yellow-500 dark:bg-yellow-700 mr-2"></button>
                    </div>
                </div>
               
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        Enhance your lips with the luxurious, nourishing formula of Rhode Peptide Lip Tint. Infused with peptides and hydrating ingredients, this lip tint offers a smooth, soft finish while providing a natural flush of color. It deeply nourishes and plumps, leaving lips feeling moisturized all day without the sticky residue.

Perfect for a subtle, effortless look, the Rhode Peptide Lip Tint delivers a sheer, buildable tint with a lightweight, non-drying formula. Ideal for everyday wear, it combines beauty with skincare for lips that look and feel their best.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
