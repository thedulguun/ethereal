@extends('layouts.app')

@section('content')

<navbar>
  <div class='w-full py-3 border-b'>
    <div class='flex justify-between px-20 items-center font-semibold'>
      <div>
        <img src="/images/logo_jn.jpg"
           alt="Product" class="h-40 w-40 object-cover rounded-t-xl"  />
      </div>
      <div class='flex xl:gap-10 md:gap-8 gap-2'>
        <a href="/" class="text-gray-500 hover:text-black">Home</a>
        <a href="" class="text-gray-500 hover:text-black">About</a>
        <a href="" class="text-gray-500 hover:text-black">Products</a>
        <a href="" class="text-gray-500 hover:text-black">Contact</a>
      </div>
      <div>
        <button class='py-2 px-6 bg-black text-white rounded-3xl font-semibold'>Login</button>
      </div>
    </div>
  </div>
</navbar>
  
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

    <div class="text-center p-10">
      <h1 class="font-bold text-4xl mb-4">Responsive Product Card Grid</h1>
      <h2 class="text-3xl">Tailwind CSS</h2>
  </div>
  

  <section id="Projects" class="mx-auto grid w-fit grid-cols-1 gap-y-20 gap-x-14 mt-10 mb-5 md:grid-cols-2 lg:grid-cols-3 justify-items-center">
  
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  
      <div class="w-72 bg-white shadow-md rounded-xl transition-transform duration-500 hover:scale-105 hover:shadow-xl">
          <a href="#">
              <img src="/images/rhode_lip.jpg"
                   alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
              <div class="p-4">
                  <span class="text-gray-400 uppercase text-xs">Rhode</span>
                  <p class="text-lg font-bold text-black truncate capitalize">Piptide Lip</p>
                  <div class="flex items-center">
                      <p class="text-lg font-semibold text-black my-3">₮95'000</p>
                      <del class="ml-2 text-sm text-gray-600">₮100'000</del>
                      <div class="ml-auto">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                              <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                          </svg>
                      </div>
                  </div>
              </div>
          </a>
      </div>
  
     
  
  </section>
  

@endsection
