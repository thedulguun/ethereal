<?php

$error = isset($error) ? $error : '';

?>
 @include('pages.components.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">

    <div class="relative bg-gray-50 w-full h-full flex items-center justify-center">
        <img src="/images/background1.jpg" alt="Background Image" class="absolute inset-0 w-full h-full object-cover opacity-50">

        <div class="relative z-10 bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-semibold text-center text-gray-700 mb-6">Login</h2>

            <?php if (!empty($error)): ?>
                <div class="bg-red-200 text-red-800 p-4 rounded-lg mb-4"> <?php echo htmlspecialchars($error); ?> </div>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required 
                           class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full border border-gray-300 focus:ring-blue-500 focus:border-blue-500 px-4 py-2 mt-1 bg-gray-100 rounded-md shadow-sm focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Sign In
                </button>
            </form>

            <div class="mt-4 text-center text-sm">
                <a href="#" class="text-blue-500 hover:underline">Forgot your password?</a>
            </div>

            <p class="mt-4 text-center text-sm">Don't have an account? <a href="register.php" class="text-blue-500 hover:underline">Sign up!</a></p>
        </div>
    </div>

</body>
</html>
