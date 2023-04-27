<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', __('Planets Explorer 1'))</title>

        @section('style')
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @show
    </head>
    <body>

        @include('layouts.navigation')

        @hasSection('content')
            @yield('content')
        @endif

        @section('script')
            <script src="{{ asset('/js/app.js') }}"></script>
        @show

    </body>
</html>
