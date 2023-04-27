@extends('layouts.app')

{{--@section('title', $title)--}}

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-10 offset-1 col-sm-6 offset-sm-3">
                <a href="{{ url('/') }}" class="text-decoration-none">
                    <h1 class="text-warning text-center my-3">{{ __('Planets Explorer') }}</h1>
                </a>

                @isset($planets)
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
                        @forelse($planets as $planet)
                            <tr>
                                <td>{{ $planet->id }}</td>
                                <td>{{ $planet->name }}</td>
                                <td>{{ $planet->rotation_period }}</td>
                                <td>{{ $planet->diameter }}</td>
                                <td class="text-nowrap">{{ $planet->gravity }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-danger">{{ __('No planets') }}</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $planets->appends(['filter' => Request::get('filter')])->links() }}
                </div>
                @endisset
                @empty($planets)
                    <p class="text-center text-danger">{{ __('No planets') }}</p>
                @endempty
            </div>
        </div>
    </div>
@endsection
