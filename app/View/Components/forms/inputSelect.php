<?php
// app/view/components/forms/inputSelect.php
// views/components/forms/input-select.blade.php

namespace App\View\Components\forms;

use Illuminate\View\Component;

class inputSelect extends Component
{
    public $label, $idName, $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $idName, array $options = [], string $label = '')
    {
        $this->idName = $idName;
        $this->options = $options;
        $this->label = $label;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.forms.input-select');
    }
}
