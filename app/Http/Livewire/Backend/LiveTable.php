<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;

class LiveTable extends Component
{
    public $collection;

    public function __construct()
    {
        $this->collection = User::paginate(5);
    }
    public function render()
    {
        return view('livewire.backend.live-table', [
            'regs' => $this->collection,
        ]);
    }
}
