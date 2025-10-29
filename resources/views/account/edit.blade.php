@extends('layouts.app')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-8">
        <div class="flex items-center space-x-4">
            <img src="{{ $user->profile_photo_url }}" alt="Profile photo" class="h-16 w-16 rounded-full object-cover border border-gray-200">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Account settings</h1>
                <p class="text-gray-500">Manage your personal details and profile preferences.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="rounded-md bg-green-50 border border-green-200 text-green-700 px-4 py-3">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="rounded-md bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username (optional)</label>
                    <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of birth (optional)</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                        value="{{ old('date_of_birth', optional($user->date_of_birth)->format('Y-m-d')) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone (optional)</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div>
                    <label for="home_address" class="block text-sm font-medium text-gray-700">Home address (optional)</label>
                    <input type="text" id="home_address" name="home_address" value="{{ old('home_address', $user->home_address) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>

                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Mailing address (optional)</label>
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">
                </div>
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio (optional)</label>
                <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div>
                <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile photo (optional)</label>
                <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-black file:text-white hover:file:bg-gray-800">
                @if ($user->profile_photo_path)
                    <p class="mt-2 text-sm text-gray-500">Current photo stored in your library.</p>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New password (optional)</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black" autocomplete="new-password">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm new password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full rounded-lg border-gray-300 focus:border-black focus:ring-black" autocomplete="new-password">
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-full font-semibold hover:bg-gray-900">
                    Save changes
                </button>
            </div>
        </form>

        <form action="{{ route('logout') }}" method="POST" class="pt-4 border-t border-gray-200">
            @csrf
            <button type="submit"
                class="mt-4 inline-flex items-center justify-center px-6 py-2 border-2 border-red-500 text-red-500 font-semibold rounded-full transition hover:bg-red-500 hover:text-white">
                Log out
            </button>
        </form>
    </div>
</div>
@endsection
