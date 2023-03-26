<?php

namespace App\View\Components;

use Illuminate\View\Component;

class compEstado extends Component
{

    public $estado;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($valor = 0, $tipo = "activo-inactivo")
    {
        switch ($tipo) {
            case 'si-no':
                if ($valor == 0)
                    $this->estado = 'no';
                else
                    $this->estado = 'si';
                break;

            case 'on-off':
                if ($valor == 0)
                    $this->estado = 'off';
                else
                    $this->estado = 'on';
                break;

            default:
                if ($valor == 0)
                    $this->estado = 'inactivo';
                else
                    $this->estado = 'activo';
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comp-estado');
    }
}
