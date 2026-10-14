<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class panelOffice extends Component
{
    /**
     * Create a new component instance.
     */
    public $rooms;
    public function __construct($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel-office');
    }
}
