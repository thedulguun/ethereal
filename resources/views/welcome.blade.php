@extends('layouts.app')

@section('content')

  <section class="relative bg-cover bg-center h-screen" style="background-image: url('/images/beauty.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-30 flex justify-center items-center">
    <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-extrabold text-center px-6 sm:px-12">
      Make your Own Beauty.
    </h1>
    </div>
  </section>

  <section class="bg-white py-8">
    <div class="container mx-auto text-center">
    <div class="flex justify-center space-x-8">
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">FEATURED</a>
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SKIN</a>
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">LIP+CHEEK</a>
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SETS</a>
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">AWARD
      WINNERS</a>
      <a href="#"
      class="px-6 py-3 bg-gray-100 text-gray-800 font-medium rounded-md hover:bg-gray-200 transition duration-300">SHOP
      ALL</a>
    </div>
    </div>
  </section>


  <div class="text-center p-10">
    <h1 class="font-bold text-4xl mb-4">BEST SELLER</h1>
  </div>


  <section id="Projects"
    class="mx-auto grid w-fit grid-cols-1 gap-y-20 gap-x-14 mt-10 mb-5 md:grid-cols-2 lg:grid-cols-3 justify-items-center">

    @foreach ($data as $value)
    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
      <a href="/product/{{ $value->product_id }}">
        <img src="/images/rhode_lip.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
        <div class="p-4">
        <span class="text-gray-400 uppercase text-xs">{{$value->product_name}}</span>
        <p class="text-lg font-bold text-black truncate capitalize">{{$value->description}}</p>
        <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮{{$value->price}}</p>
        </div>
        </div>
      </a>
    </div>
  @endforeach



    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
      <img src="/images/lauramercier1.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
      <div class="p-4">
      <span class="text-gray-400 uppercase text-xs">Laura Mercier</span>
      <p class="text-lg font-bold text-black truncate capitalize">Ultra-Blur Talc-Free Translucent Loose Setting
        Powder</p>
      <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮190'000</p>

      </div>
      </div>
    </a>
    </div>
    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
      <img src="/images/diorlipscrub.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
      <div class="p-4">
      <span class="text-gray-400 uppercase text-xs">Dior</span>
      <p class="text-lg font-bold text-black truncate capitalize">Dior Addict Lip Sugar Scrub</p>
      <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮160'000</p>

      </div>
      </div>
    </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
      <img src="/images/matteblush.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
      <div class="p-4">
      <span class="text-gray-400 uppercase text-xs">Charlotte Tilbury</span>
      <p class="text-lg font-bold text-black truncate capitalize">Matte Blush Wand</p>
      <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮168'000</p>


      </div>
      </div>
    </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
      <img src="/images/duckplump.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
      <div class="p-4">
      <span class="text-gray-400 uppercase text-xs">NYX</span>
      <p class="text-lg font-bold text-black truncate capitalize"> Duck Plump High Pigment Lip Plumping Gloss</p>
      <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮75'000</p>


      </div>
      </div>
    </a>
    </div>

    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
    <a href="#">
      <img src="/images/makeupforever.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
      <div class="p-4">
      <span class="text-gray-400 uppercase text-xs">MAKE UP FOR EVER</span>
      <p class="text-lg font-bold text-black truncate capitalize">HD Skin Face Essentials – Longwear Full Face Cream
        Palette</p>
      <div class="flex items-center">
        <p class="text-lg font-semibold text-black my-3">₮310'000</p>


      </div>
      </div>
    </a>
    </div>



  </section>


@endsection
