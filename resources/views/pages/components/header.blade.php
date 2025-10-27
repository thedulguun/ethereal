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
          @else
            <a href="{{ route('account.edit') }}" class="inline-flex items-center gap-3 rounded-full border border-transparent bg-white px-3 py-1.5 text-sm font-semibold text-gray-800 shadow-sm hover:shadow-md">
              <span class="inline-flex h-9 w-9 items-center justify-center overflow-hidden rounded-full bg-white ring-1 ring-gray-200">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }} avatar" class="h-full w-full object-cover" />
              </span>
              <span class="pr-2">{{ \Illuminate\Support\Str::limit(Auth::user()->name, 18) }}</span>
            </a>
          @endguest
        </div>
      </div>
    </div>
  </navbar>
