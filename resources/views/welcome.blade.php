@use('Illuminate\Support\Facades\Vite')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        {!! Vite::content('resources/css/app.css') !!}
    </style>
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>

</head>

<body class="font-sans antialiased min-h-screen grid place-items-center">
    @if (Route::has('login'))
            @auth
            <div class="absolute top-0 right-0 p-6">
                <a href="{{ url('/notes') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] ">
                    Notes
                </a>
            </div>
            @else
                <div class="absolute top-0 right-0 p-6">
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 mr-4 inline-block">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800">
                            Register
                        </a>

                </div>
        @endif
    @endauth
    @endif
    <h1 class="text-7xl">List Notes</h1>
</body>

</html>
