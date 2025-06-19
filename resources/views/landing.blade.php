<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @keyframes fadeOut {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(0.9);
            }
            100% {
                opacity: 0;
                transform: scale(0.8);
            }
        }

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

        .fade-out {
            animation: fadeOut 2s ease-in forwards;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
        }

        .logo-text {
            text-align: center;
        }

        .logo {
            font-size: 3rem;
            font-weight: bold;
        }

        .logo {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>

<body class="background fade-in">
    <div class="logo-text">
        <img src="{{ asset('storage/Logo (1).png') }}" alt="Logo" class="mx-auto w-64 h-auto">
    </div>

    <script>
        // Animasi transisi ke halaman login
        setTimeout(function () {
            const background = document.querySelector('.background');
            background.classList.remove('fade-in');
            background.classList.add('fade-out');

            setTimeout(function () {
                window.location.href = "{{ route('login') }}";
            }, 2000); // Tunggu animasi fade-out selesai (2 detik)
        }, 3500); // Tunggu durasi landing page selesai (3.5 detik)
    </script>
</body>

</html>
