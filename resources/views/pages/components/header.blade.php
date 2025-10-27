<navbar>
    <div class='w-full py-3 border-b'>
      <div class='flex justify-between px-20 items-center font-semibold'>
        <div>
          <a href="/">
          <img src="/images/jn_logo.jpg"
             alt="Product" class="h-20 w-40 object-cover rounded-t-xl"  />
             </a>
        </div>
        <div class='flex xl:gap-10 md:gap-8 gap-2'>
          <a href="/" class="text-gray-500 hover:text-black">Home</a>
          <a href="/about" class="text-gray-500 hover:text-black">About</a>
          <a href="/productpage" class="text-gray-500 hover:text-black">Products</a>
          <a href="/contact" class="text-gray-500 hover:text-black">Contact</a>
        </div>
        <div>
          @guest
            <a href="{{ route('login') }}"><button class='py-2 px-6 bg-black text-white rounded-3xl font-semibold'>Login</button></a>
          @endguest
          @auth
            <a href="{{ route('account.edit') }}" class="flex items-center gap-3 py-2 px-4 bg-white border border-gray-200 rounded-3xl hover:shadow">
              <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="h-10 w-10 rounded-full object-cover border border-gray-200">
              <span class="text-gray-700 font-semibold">{{ Auth::user()->name }}</span>
            </a>
          @endauth
        </div>
      </div>
    </div>
  </navbar>
