{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')  {{-- uses your main layout; change if your layout differs --}}

@section('content')
<div class="max-w-xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Contact us</h1>

  {{-- Flash “success” message after send --}}
  @if (session('status'))
    <div class="p-3 rounded bg-green-100 text-green-800 mb-4">
      {{ session('status') }}
    </div>
  @endif

  <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
    @csrf {{-- CSRF protection token; required for all POSTs in Laravel --}}

    <div>
      <label class="block text-sm font-medium">Your name</label>
      <input name="name"
             value="{{ old('name') }}"
             class="w-full border rounded p-2"
             required>
      @error('name')
        <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Your email</label>
      <input type="email"
             name="email"
             value="{{ old('email') }}"
             class="w-full border rounded p-2"
             required>
      @error('email')
        <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label class="block text-sm font-medium">Message</label>
      <textarea name="message"
                rows="6"
                class="w-full border rounded p-2"
                required>{{ old('message') }}</textarea>
      @error('message')
        <p class="text-red-600 text-sm">{{ $message }}</p>
      @enderror
    </div>

    <button class="px-4 py-2 rounded bg-black text-white">Send</button>
  </form>
</div>
@endsection
