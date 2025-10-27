@extends('layouts.app')

@section('content')
<div class="bg-rose-50 py-20">
    <div class="mx-auto max-w-3xl rounded-3xl bg-white/95 p-12 text-center shadow-xl">
        <h1 class="text-4xl font-bold text-gray-900">You're logged in!</h1>
        <p class="mt-4 text-lg text-gray-600">Visit your account to manage personal details, update your profile picture, or adjust your preferences.</p>
        <a href="{{ route('account.edit') }}"
           class="mt-8 inline-flex items-center justify-center rounded-full bg-rose-500 px-8 py-3 text-white font-semibold shadow hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
            Go to my account
        </a>
    </div>
</div>
@endsection
