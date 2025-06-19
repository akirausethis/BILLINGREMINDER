<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            50% {
                opacity: 0.5;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .fade-in {
            animation: fadeIn 2s ease-out forwards;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }

        .form-container {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md fade-in-up transform transition-all duration-300 ease-in-out container-hover">
        <h1 class="text-4xl text-center text-gray-700 mb-6 font-bold">Welcome Back</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-600 text-sm">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-lg input-focus"
                    required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-600 text-sm">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out hover:shadow-lg input-focus"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg focus:outline-none hover:bg-blue-600 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-110 btn-hover">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">Don't have an account? <a href="{{ route('register.form') }}"
                class="text-blue-500 hover:underline">Register here</a></p>

    </div>
</body>

</html>
