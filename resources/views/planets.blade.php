<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Planets Explorer') }}</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-dark d-flex justify-content-center align-items-center vh-100">

        <div>
            <h1 class="text-warning text-center mb-3">{{ __('Planets Explorer') }}</h1>

            <form action="#" method="POST">
                @csrf

                <caption class="visually-hidden">{{ __('Search Planet Form') }}</caption>

                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-dark text-warning border-warning" id="addon-wrapping">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                            <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                        </svg>
                    </span>

                    <label for="name" class="visually-hidden">{{ __('planet name') }}</label>
                    <input type="text" class="form-control bg-dark border-warning text-warning" name="name" id="name" placeholder="{{ __('planet name') }}">

                    <button class="btn btn-outline-warning" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg><span class="visually-hidden">Find</span>
                    </button>
                </div>
            </form>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
