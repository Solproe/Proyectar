<!DOCTYPE html>
    <html lang="en">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <title>Solproe</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

        <script src="{{ mix('js/app.js') }}"></script>
        <style>
            .color2 {
                background: #fcc314;
            }

            .slider {
                /* background: url("../img/Chivacola.jpg"); */
                /* Ocupara toda la altura disponible */
                height: 100vh;
                /* La imagen de adapte al tamaño del despoditivo */
                background-size: cover;
                /* La imagen estara centrada */
                background-position: center;
            }

            ;
        </style>
    </head>

    <body>

        <div>
            <div class="form-group" style="top:50%;width:100%;">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h1 class="text-center">WELCOME</h1>
                <h3 class="text-center mt-10">SOLPROE - PROYECTAR</h3>
                <p class="ml-8 text-center text-sm text-text  sm:text-right sm:ml-0">Ambulancias Proyectar SAS</p>
            </div>
            <div class="ml-8 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
            @if (Route::has('login'))

                <div class="text-center">
                    <br>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ route('home') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline cursor-pointer hover:text-orange-500 capitalize">Home</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline cursor-pointer hover:text-orange-500 capitalize">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                </div>
            @endif
        </div>
        <footer>
            <p class="ml-8 text-center text-sm text-gray-500 sm:text-right sm:ml-0">Soluciones Profesionales Efectivas SAS -
                copyright © All rights reserved</p>
        </footer>
    </body>

</html
