<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
  <div class="relative bg-gray-50 w-full h-full flex items-center justify-center">
          <img src="/images/background2.jpg" alt="Background Image" class="absolute inset-0 w-full h-full object-cover opacity-50">

      <div class="relative z-10 bg-red-50 p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center mb-6">Sign Up</h2>
        <form action="#" method="POST">
          <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="username" name="username" required class="mt-1 block w-full px-4 py-2 border border-pink-500 rounded-md shadow-sm  focus:border-pink-300"/>
          </div>

          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" required class="mt-1 block w-full px-4 py-2 border border-pink-50 rounded-md shadow-sm focus:border-pink-300"/>
          </div>

          <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required class="mt-1 block w-full px-4 py-2 border border-pink-50 rounded-md shadow-sm focus:border-pink-300"/>
          </div>

          <div class="mb-6">
            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required class="mt-1 block w-full px-4 py-2 border border-pink-50 rounded-md shadow-sm  focus:border-pink-300"/>
          </div>

          <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Sign Up</button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">Already have an account? <a href="/login" class="text-blue-500 hover:underline">Log in</a></p>
      </div>
    </div>
</div>
