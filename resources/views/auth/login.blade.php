@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] bg-gradient-to-br from-rose-100 via-white to-pink-100 py-16">
    <div class="mx-auto max-w-md rounded-3xl bg-white/90 p-10 shadow-2xl backdrop-blur">
        <h1 class="mb-2 text-center text-3xl font-semibold text-gray-900">Welcome back</h1>
        <p class="mb-8 text-center text-gray-500">Sign in with your email address to reach your account.</p>

        @if (session('status'))
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="inline-flex items-center gap-2 text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-rose-500 focus:ring-rose-400" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
                <a href="{{ route('password.request') }}" class="font-medium text-rose-500 hover:text-rose-400">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full rounded-full bg-rose-500 py-3 text-white font-semibold shadow-lg shadow-rose-200 transition hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                Sign in
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-rose-500 hover:text-rose-400">Create one</a>
        </p>
    </div>
</div>
@endsection
