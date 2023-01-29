<?php
// app.view.components.forms.table.php //
// resources.views.components.forms.table.blade.php //
namespace App\View\Components\forms;

use Illuminate\View\Component;
use Livewire\WithPagination;

class table extends Component
{
    use WithPagination;

    public $caption;
    public $tTitles; // capitalize, uppercase, lowercase, normal-case
    public $tAlign; // center, left, right, justify, start, end

    public $borderCell; // border-separate, border-collapse

    public $bSearch;
    public $Search;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $caption = null,
        $tTitles = 'capitalize',
        $tAlign = 'text-center',

        $borderCell = 'border-collapse',

        $bSearch = null,
    ) {
        $this->caption = $caption;
        $this->tTitles = $tTitles;
        $this->tAlign = $tAlign;

        $this->borderCell = $borderCell;
        $this->bSearch = $bSearch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.table');
    }
}
