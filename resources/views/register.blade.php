<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .input-focus:hover,
        .input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .btn-hover:hover {
            background-color: #3b82f6;
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.2);
        }

        .container-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            background-color: #f9dcdc;
            color: #d9534f;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
            font-weight: normal;
            box-shadow: 0 4px 15px rgba(217, 53, 47, 0.4);
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-900 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md container-hover">
        <h1 class="text-4xl font-bold text-center text-gray-700 mb-6">Register</h1>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-gray-600 text-sm">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 form-input input-focus" required>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-gray-600 text-sm">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 form-input input-focus" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-600 text-sm">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 form-input input-focus" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-600 text-sm">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 form-input input-focus" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg focus:outline-none btn-hover">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">Already have an account? <a href="{{ route('login.form') }}"
                class="text-blue-500 hover:underline">Login here</a></p>
    </div>
</body>

</html>
