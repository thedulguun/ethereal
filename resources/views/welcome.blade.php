@extends('layouts.app')

@section('content')

@include('pages.components.header')
  
<section class="relative bg-cover bg-center h-screen" style="background-image: url('/images/beauty.jpg');">
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


    <div class="text-center p-10">
      <h1 class="font-bold text-4xl mb-4">BEST SELLER</h1>
  </div>
  

  <section id="Projects" class="mx-auto grid w-fit grid-cols-1 gap-y-20 gap-x-14 mt-10 mb-5 md:grid-cols-2 lg:grid-cols-3 justify-items-center">
  
    <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
      <a href="{{ url('/product1')}}">
        <img src="/images/rhode_lip.jpg" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
        <div class="p-4">
          <span class="text-gray-400 uppercase text-xs">Rhode</span>
          <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
          <div class="flex items-center">
            <p class="text-lg font-semibold text-black my-3">₮95'000</p>
          </div>
        </div>
      </a>
    </div>
    
    
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/lauramercier1.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Laura Mercier</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Ultra-Blur Talc-Free Translucent Loose Setting Powder</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮190'000</p>
                      
                  </div>
              </div>
          </a>
      </div>
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/diorlipscrub.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
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
              <img src="/images/matteblush.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
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
              <img src="/images/duckplump.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">NYX</span>
                  <p class="text-lg font-bold text-black truncate capitalize"> Duck Plump High Pigment Lip Plumping Gloss</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮25'000</p>

                      
                  </div>
              </div>
          </a>
      </div>
  
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/makeupforever.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">MAKE UP FOR EVER</span>
                  <p class="text-lg font-bold text-black truncate capitalize">HD Skin Face Essentials – Longwear Full Face Cream Palette</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮310'000</p>

                      
                  </div>
              </div>
          </a>
      </div>
  
     
  
  </section>

  <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
    <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
      <div class="sm:col-span-2">
        <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
          
          <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Jinnion</span>
        </a>
        <div class="mt-6 lg:max-w-sm">
          <p class="text-sm text-gray-800">
            Jinnion celebrates beauty, confidence, and self-expression.
          </p>
          <p class="mt-4 text-sm text-gray-800">
            We craft high-performance, clean, and sustainable products that empower you to feel your best while caring for the planet.
          </p>
        </div>
      </div>
      <div class="space-y-2 text-sm">
        <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
        <div class="flex">
          <p class="mr-1 text-gray-800">Phone:</p>
          <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">+976 99417761</a>
        </div>
        <div class="flex">
          <p class="mr-1 text-gray-800">Email:</p>
          <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">jinnionbeauty@gmail.com</a>
        </div>
        <div class="flex">
          <p class="mr-1 text-gray-800">Address:</p>
          <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
            312 Lovely Street, NY
          </a>
        </div>
      </div>
      <div>
        <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
        <div class="flex items-center mt-1 space-x-3">
          <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
              <path
                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
              ></path>
            </svg>
          </a>
          <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
              <circle cx="15" cy="15" r="4"></circle>
              <path
                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
              ></path>
            </svg>
          </a>
          <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
              <path
                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
              ></path>
            </svg>
          </a>
        </div>
        <p class="mt-4 text-sm text-gray-500">
          You can contact with us all sources.
        </p>
      </div>
    </div>
    <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t lg:flex-row">
      
      <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
        <li>
          <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy Policy</a>
        </li>
        <li>
          <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms &amp; Conditions</a>
        </li>
      </ul>
    </div>
  </div>
  

@endsection
