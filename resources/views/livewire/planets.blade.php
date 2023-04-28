<div>

    @isset($planets)
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-3">name</th>
                    <th class="col-2 text-nowrap">
                        <a wire:click="sortBy('rotation_period')"
                           class="{{ $sortBy === 'rotation_period' ? 'text-warning' : '' }}"
                        >rotation period</a>
                    </th>
                    <th class="col-2">
                        <a wire:click="sortBy('diameter')"
                           class="{{ $sortBy === 'diameter' ? 'text-warning' : '' }}"
                        >diameter</a>
                    </th>
                    <th class="col-4 text-nowrap">
                        <a wire:click="sortBy('gravity')"
                           class="{{ $sortBy === 'gravity' ? 'text-warning' : '' }}"
                        >gravity</a>
                    </th>
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
            {{ $planets->links() }}
        </div>
    @endisset
    @empty($planets)
        <p class="text-center text-danger">{{ __('No planets') }}</p>
    @endempty
</div>
