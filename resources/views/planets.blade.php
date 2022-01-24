<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ __('Planets Explorer') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row ">
                <div class="col-10 offset-1 col-sm-6 offset-sm-3">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <h1 class="text-warning text-center my-3">{{ __('Planets Explorer') }}</h1>
                    </a>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr>
                                <th><a href="{{ route('planet.index') }}/?filter=id" class="{{ Request::get('filter') === 'id' ? 'active' : '' }}">#</a></th>
                                <th class="col-4"><a href="{{ route('planet.index') }}/?filter=name" class="{{ Request::get('filter') === 'name' ? 'active' : '' }}">name</a></th>
                                <th class="col-1 text-nowrap"><a href="{{ route('planet.index') }}/?filter=rotation_period" class="{{ Request::get('filter') === 'rotation_period' ? 'active' : '' }}">rotation period</a></th>
                                <th class="col-2"><a href="{{ route('planet.index') }}/?filter=diameter" class="{{ Request::get('filter') === 'diameter' ? 'active' : '' }}">diameter</a></th>
                                <th class="col-4 text-nowrap"><a href="{{ route('planet.index') }}/?filter=gravity" class="{{ Request::get('filter') === 'gravity' ? 'active' : '' }}">gravity</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($planets as $planet)
                                <tr>
                                    <td>{{ $planet->id }}</td>
                                    <td>{{ $planet->name }}</td>
                                    <td>{{ $planet->rotation_period }}</td>
                                    <td>{{ $planet->diameter }}</td>
                                    <td class="text-nowrap">{{ $planet->gravity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $planets->appends(['filter' => Request::get('filter')])->links() }}
                    </div>

                </div>
            </div>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
