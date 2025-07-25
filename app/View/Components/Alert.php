<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $text;
    public $color;
    /**
     * Create a new component instance.
     */
    public function __construct($text, $color)
    {
        $this->text = $text;
        $this->color = $color;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
