<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navigationMenu extends Component
{
    public $menus = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = array(
            [
                'name' => 'main',
                'title' => __('main'),
                'href' => '/',
                'active' => setActive('welcome'),
                'disabled' => false,
            ],
            [
                'name' => 'users',
                'title' => __('users'),
                'subMenu1' => array(
                    [
                        'name' => 'user',
                        'title' => __('user'),
                        'href' => 'users.index',
                        'active' => setActive('users.*'),
                        'disabled' => false,
                    ],
                    [
                        'name' => 'roles',
                        'title' => __('Roles'),
                        'href' => 'users.roles',
                        'active' => setActive('users.*'),
                        'disabled' => false,
                    ],
                    [
                        'name' => 'permissions',
                        'title' => __('Permissions'),
                        'href' => 'users.permissions',
                        'active' => setActive('users.*'),
                        'disabled' => false,
                    ],
                )
            ],
            // [
            // 'name' => 'acercade',
            //     'title' => ' Acerca de... ',
            //     'href' => 'acercade',
            //     'active' => 'acercade',
            //     'disabled' => true,
            // ],
            // [
            // 'name' => 'contacto',
            //     'title' => 'Contáctanos',
            //     'href' => 'contacto',
            //     'active' => 'contacto.*',
            //     'disabled' => true,
            // ],
        );
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navigation-menu');
    }
}
