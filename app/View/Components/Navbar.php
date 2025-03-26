<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{

    public $menus;

    public function __construct()
    {
        $this->menus = [
            ['title' => 'Home', 'link' => '/'],
            ['title' => 'Blog', 'link' => '/blog'],
            ['title' => 'About', 'link' => '/about'],
            ['title' => 'Contact', 'link' => '/contact'],
        ];
    }

    public function render()
    {
        return view('components.navbar');
    }
    /*
     Create a new component instance.
    
    public function __construct()
    {
        //
    }

     * Get the view / contents that represent the component.
     
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
    */
}
