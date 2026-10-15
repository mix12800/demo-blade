<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class roomPanel extends Component
{
    /**
     * Create a new component instance.
     */
    public $room;
    public function __construct($room)
    {
        $this->room = $room;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-panel');
    }
}
