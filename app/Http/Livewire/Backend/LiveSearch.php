<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class LiveSearch extends Component
{
    public $search;

    /** escuchas */
    protected $listeners = [
        'fncSearchClear',
        // 'roleUpdating' => 'render',
    ];

    public function render()
    {
        $this->emit('Search', $this->search);
        return view('livewire.backend.live-search');
    }

    public function fncSearchClear()
    {
        $this->reset(['search']);
    }
}
