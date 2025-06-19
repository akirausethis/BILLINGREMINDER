<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Billing Reminder')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .icon-container {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .icon-container i {
            color: #000000;
            font-size: 0.875rem;
        }

        .fixed-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 10;
            background-color: #000000;
            width: 18rem;
            font-size: 0.875rem;
            padding-bottom: 2rem;
            display: flex;
            flex-direction: column;
        }

        .fixed-sidebar ul li {
            color: #ffffff;
            transition: all 0.3s ease;
            margin-bottom: 1.25rem; /* Tambahkan jarak antar tombol */
        }

        .fixed-sidebar ul li:hover {
            color: #000000;
            background-color: #ffffff;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 25px;
        }

        .fixed-sidebar ul li a {
            font-size: 1rem;
        }

        .icon-title {
            color: #ffffff;
            font-size: 2rem;
        }

        .content-wrapper {
            margin-left: 18rem;
            padding: 1.5rem;
        }

        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 1rem;
            border-radius: 10px;
        }

        .profile-container .profile-info {
            color: #ffffff;
            text-align: center;
        }

        .profile-container .profile-info a {
            font-size: 0.875rem;
        }

        .profile-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        /* Footer styling */
        .sidebar-footer {
            font-size: 0.75rem;
            text-align: center;
            line-height: 1.5;
            margin-top: 1rem;
            color: #d1d5db;
        }

        .sidebar-footer i {
            font-size: 0.875rem;
        }

        /* Logout Button */
        .logout-btn {
            padding: 1rem;
            background-color: #e53e3e;
            color: #ffffff;
            text-align: center;
            border-radius: 5px;
            margin-top: 10px;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c53030;
        }

        .mt-auto {
            margin-top: auto;
        }

        .profile-container .profile-info span {
            font-size: 1.125rem; /* Perbesar teks "Hello, User" */
            font-weight: bold;
        }

        button.w-full {
            width: 11/12; /* Lebarkan tombol "View Profile" */
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed-sidebar shadow-md">
        <div class="flex flex-col h-full">
            <!-- Header -->
            <div class="p-4 flex items-center">
                <div class="icon-title mr-4 ml-1">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div>
                    <div class="text-gray-200 text-sm">Welcome to your</div>
                    <div class="text-base font-bold text-gray-200">Billing Reminder</div>
                </div>
            </div>

            <div class="profile-container mt-4">
                <div class="profile-info">
                    <!-- Quote -->
                    <span class="text-gray-200 text-base italic mb-2 block">"Stay organized, stay debt-free!"</span>
                    <span class="text-white block">Hello, {{ Auth::user()->name }}</span>
                    <button onclick="window.location.href='/profile'"
                        class="flex items-center justify-center px-2 py-2 mt-3 bg-blue-500 text-white rounded hover:bg-blue-600 w-full">
                        View Profile
                    </button>
                </div>
            </div>
            
            <!-- Divider with text -->
            <div class="flex items-center justify-center mx-4 mb-4">
                <div class="w-full h-px bg-gray-300"></div>
                <span class="px-4 text-gray-500 text-sm font-semibold">Pick One</span>
                <div class="w-full h-px bg-gray-300"></div>
            </div>
            
            <!-- New Reminder Button -->
            <button onclick="window.location.href='/reminders/create?user_id={{ auth()->user()->id }}'"
                class="flex items-center justify-center px-4 py-2 mb-4 ml-3 bg-blue-500 text-white rounded hover:bg-blue-600 w-11/12">
                + New Reminder
            </button>
            
            <!-- Sidebar Links -->
            <ul class="mt-2 space-y-4">
                <li class="flex items-center block py-2 px-4 text-gray-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-house"></i>
                    </div>
                    <a href="{{ route('dashboard') }}" class="ml-3">Dashboard</a>
                </li>
                <li class="flex items-center block py-2 px-4 text-gray-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>
                    <a href="/bill" class="ml-3">Bills</a>
                </li>
                <li class="flex items-center block py-2 px-4 text-gray-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <a href="/payment" class="ml-3">Payment</a>
                </li>
                <li class="flex items-center block py-2 px-4 text-gray-300">
                    <div class="icon-container">
                        <i class="fa-solid fa-calendar"></i>
                    </div>
                    <a href="/history" class="ml-3">History</a>
                </li>
            </ul>

            <!-- Logout Button -->
            <div class="mt-auto p-4 mb-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
                <!-- Copyright -->
                <div class="sidebar-footer">
                    @ All copyright served 2025
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</body>

</html>
