@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-10 offset-1 col-sm-8 offset-sm-2">
                <a href="{{ route('planet.index') }}" class="text-decoration-none">
                    <h1 class="text-warning text-center my-3">{{ $title }}</h1>
                </a>

                @livewire('planets')
            </div>
        </div>
    </div>
@endsection
