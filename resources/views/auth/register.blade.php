@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-tr from-pink-100 via-white to-rose-100 py-16">
    <div class="mx-auto max-w-md rounded-3xl bg-white/95 p-10 shadow-2xl backdrop-blur">
        <h1 class="mb-2 text-center text-3xl font-semibold text-gray-900">Create your Ethereal account</h1>
        <p class="mb-8 text-center text-gray-500">Just a few details to get started. You can add the rest later.</p>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full name *</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address *</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                <input id="password" name="password" type="password" required
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password *</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
            </div>

            <button type="submit"
                class="w-full rounded-full bg-rose-500 py-3 text-white font-semibold shadow-lg shadow-rose-200 transition hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                Sign up
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-rose-500 hover:text-rose-400">Log in</a>
        </p>
    </div>
</div>
@endsection
