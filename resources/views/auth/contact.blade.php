@extends('layouts.app')

@section('content')
@include('pages.components.header')

  
<div class="min-h-screen bg-pink-100 py-6 flex flex-col justify-center sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div
    class="absolute inset-0 bg-gradient-to-r from-pink-400 to-purple-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
</div>
      <div class="text-white relative px-4 py-10 bg-indigo-400 shadow-lg sm:rounded-3xl sm:p-20">
        
          <div class="text-center pb-6">
              <h1 class="text-3xl">Contact Us!</h1>
          </div>

          <form>

              <input
                      class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="text" placeholder="Name" name="name">

              <input
                      class="shadow mb-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      type="email" placeholder="Email" name="email">

             

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