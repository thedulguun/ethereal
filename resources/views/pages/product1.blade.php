
@extends('layouts.app')

@section('content')


<navbar>
    <div class='w-full py-3 border-b'>
      <div class='flex justify-between px-20 items-center font-semibold'>
        <div>
          <img src="/images/jn_logo.jpg"
             alt="Product" class="h-20 w-40 object-cover rounded-t-xl"  />
        </div>
        <div class='flex xl:gap-10 md:gap-8 gap-2'>
          <a href="/welcome" class="text-gray-500 hover:text-black">Home</a>
          <a href="/about" class="text-gray-500 hover:text-black">About</a>
          <a href="/products" class="text-gray-500 hover:text-black">Products</a>
          <a href="/contact" class="text-gray-500 hover:text-black">Contact</a>
        </div>
        <div>
          <a href="/login"><button class='py-2 px-6 bg-black text-white rounded-3xl font-semibold'>Login</button>
        </div>
      </div>
    </div>
  </navbar>

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
                        <button class="w-6 h-6 rounded-full bg-gray-800 dark:bg-gray-200 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-red-500 dark:bg-red-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-blue-500 dark:bg-blue-700 mr-2"></button>
                        <button class="w-6 h-6 rounded-full bg-yellow-500 dark:bg-yellow-700 mr-2"></button>
                    </div>
                </div>
               
                <div>
                    <span class="font-bold text-gray-700 dark:text-gray-300">Product Description:</span>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                        sed ante justo. Integer euismod libero id mauris malesuada tincidunt. Vivamus commodo nulla ut
                        lorem rhoncus aliquet. Duis dapibus augue vel ipsum pretium, et venenatis sem blandit. Quisque
                        ut erat vitae nisi ultrices placerat non eget velit. Integer ornare mi sed ipsum lacinia, non
                        sagittis mauris blandit. Morbi fermentum libero vel nisl suscipit, nec tincidunt mi consectetur.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
