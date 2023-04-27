<?php

namespace App\Http\Livewire;

use App\Models\Planet;
use App\Traits\WithSorting;
use Livewire\Component;
use Livewire\WithPagination;

class Planets extends Component
{
    use WithPagination, WithSorting;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.planets', [
            'planets' => Planet::query()
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(10)
        ]);
    }
}
