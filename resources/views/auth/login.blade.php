<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="relative bg-gray-50 w-full h-full flex items-center justify-center">
        <img src="/images/background1.jpg" alt="Background Image" class="absolute inset-0 w-full h-full object-cover opacity-50">

        <div class="relative z-10 bg-red-50 p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Login</h2>

            <?php if (isset($error)): ?>
                <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="w-full focus:border-pink-300 px-4 py-2 mt-1 border bg-red-50 rounded-md shadow-sm focus:outline-none ">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="focus:border-pink-300 w-full px-4 py-2 mt-1 border bg-red-50 rounded-md shadow-sm focus:outline-none ">
                </div>

                <button type="submit" class="w-full bg-blue-400 text-white py-2 px-4 rounded-md hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500">Sign In</button>
            </form>

            <div class="mt-4 text-center text-sm">
                <a href="#" class="text-blue-400 hover:underline">Forgot your password?</a>
            </div>

            <p class="mt-4 text-center text-sm">Don't have an account? <a href="/register" class="text-blue-400 hover:underline">Sign up!</a></p>
        </div>
    </div>
</body>
</html>
