@extends('layouts.app')

@section('content')
@include('pages.components.header')

<div class="min-h-screen bg-pink-100 py-6 flex flex-col justify-center sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
      <div
          class="absolute inset-0 bg-gradient-to-r from-pink-400 to-purple-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
      </div>
      <div class='flex xl:gap-10 md:gap-8 gap-2'>
        <a href="/" class="text-gray-500 hover:text-black">Home</a>
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
  

<div class="contact_us_6">
  <div class="responsive-container-block container">
    <form class="form-box">
      <div class="container-block form-wrapper">
        <div class="mob-text">
          <p class="text-blk contactus-head">
            Get in Touch
          </p>
          <p class="text-blk contactus-subhead">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Felis diam lectus sapien.
          </p>
        </div>
        <div class="responsive-container-block" id="i2cbk">
          <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i10mt-3">
            <p class="text-blk input-title">
              FIRST NAME
            </p>
            <input class="input" id="ijowk-3" name="FirstName" placeholder="Please enter first name...">
          </div>

          <form>

              <input
                      class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text" placeholder="Name" name="name">

              <input
                      class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="email" placeholder="Email" name="email">

              <input
                      class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text" placeholder="Subject" name="_subject">

              <textarea
                      class="shadow mb-4 min-h-0 appearance-none border rounded h-64 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text" placeholder="Type your message here..." name="message" style="height: 121px;"></textarea>

              <div class="flex justify-between">
                  <input
                      class="shadow bg-purple-400 hover:bg-purple-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                      type="submit" value="Send ➤">
                  <input
                      class="shadow bg-purple-400 hover:bg-purple-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                      type="reset">
              </div>

          </form>
      </div>
  </div>
</div>
@endsection