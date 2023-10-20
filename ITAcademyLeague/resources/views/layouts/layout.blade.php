<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title >@yield('title')</title>

    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>

        /* Custom MTG Styles */
        .bg-mtg-bg {
            background: #1f262a;
        }

        .bg-mtg-card {
            background: #191d21;
        }

        .border-mtg-border {
            border: 4px solid #f58a4c;
        }

        .text-mtg-text {
            color: #f9f9f9;
        }
        
    </style>

</head>

<body class="bg-mtg-bg">

    <header class="bg-mtg-card p-4 text-center text-mtg-text">
        <h1 class="text-2xl font-mtg-title">MTR TOURNAMENT</h1>
    </header>

    @yield('content')

    <footer class="bg-mtg-card p-4 text-center text-mtg-text">
        &copy; 2023 MANA: The Rabblement
    </footer>

</body>

</html>