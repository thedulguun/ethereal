@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-pink-50 via-white to-rose-100 py-12">
    <div class="max-w-4xl mx-auto bg-white/90 backdrop-blur rounded-3xl shadow-xl overflow-hidden">
        <div class="flex flex-col items-center text-center px-8 pt-10 pb-6 bg-white">
            <div class="h-28 w-28 rounded-full border-4 border-white shadow-md overflow-hidden">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }} avatar" class="h-full w-full object-cover" />
            </div>
            <h1 class="mt-6 text-3xl font-semibold text-gray-900">{{ $user->name }}</h1>
            <p class="text-gray-500">Manage your personal information and preferences</p>
        </div>

        <div class="px-8 pb-10">
            @if (session('status'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full name *</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}"
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of birth</label>
                        <input id="date_of_birth" name="date_of_birth" type="date" value="{{ old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d')) }}"
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        @error('date_of_birth')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="home_address" class="block text-sm font-medium text-gray-700">Home address</label>
                    <textarea id="home_address" name="home_address" rows="3"
                        class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">{{ old('home_address', $user->home_address) }}</textarea>
                    @error('home_address')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                        <input id="password" name="password" type="password"
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200"
                            placeholder="Leave blank to keep current password">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile picture</label>
                        <input id="profile_photo" name="profile_photo" type="file" accept="image/*"
                            class="mt-2 w-full rounded-2xl border border-dashed border-rose-200 bg-white px-4 py-3 text-gray-900 focus:border-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        @error('profile_photo')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="h-16 w-16 rounded-full overflow-hidden border border-gray-200">
                            <img src="{{ $user->profile_photo_url }}" alt="Preview" class="h-full w-full object-cover">
                        </div>
                        <p class="text-sm text-gray-500">Upload a square image (max 2 MB). White circle is used by default.</p>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 rounded-full bg-rose-500 px-8 py-3 text-white font-semibold shadow hover:bg-rose-400 focus:outline-none focus:ring-2 focus:ring-rose-200">
                        Save changes
                    </button>
                </div>
            </form>
        </div>

        <div class="px-8 pb-10">
            <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center rounded-full border-2 border-red-500 px-10 py-3 text-red-500 font-semibold hover:bg-red-50 transition">
                    Log out
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
