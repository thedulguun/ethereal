@extends('layouts.app')

@section('content')

    <div class="min-h-screen flex">

        <div class="bg-white w-64 border-r shadow-sm">
            <div class="p-4 border-b">
                <div class="flex items-center justify-between">
                    <button class="text-gray-500 hover:text-gray-600 lg:hidden">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>


            <div class="py-4">
                <div class="px-4 mb-4">
                    <h2 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Ангилал</h2>
                    <nav class="mt-2 space-y-1">
                        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 rounded-lg">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Dashboard
                        </a>
                        
                        <div class="relative">
                            <button class="w-full flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                                <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                </svg>
                                Projects
                                <svg class="ml-auto h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                            <div class="mt-1 pl-11 space-y-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">Active</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">Archived</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">Drafts</a>
                            </div>
                        </div>

                        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Team
                        </a>

                        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Calendar
                        </a>
                    </nav>
                </div>


            </div>

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
    </div>

@endsection