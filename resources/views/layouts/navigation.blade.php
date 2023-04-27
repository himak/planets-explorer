<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name', 'Planets Explorer') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkAPI" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('API') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLinkAPI">
                        <li><a class="dropdown-item" href="{{ url('/api/planets/top-10') }}">TOP 10 Planets</a></li>
                        <li><a class="dropdown-item" href="{{ url('/api/planets/terrain/ocean') }}">Distribution of the specific terrain on planets</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
