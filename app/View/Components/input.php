<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $name;
    public $type;
    public $label;
    public $multiple;
    public $default;

    public function __construct($name = "input_name", $type = "text", $label = "input label", $multiple = null, $default = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->multiple = $multiple;
        $this->default = $default;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
