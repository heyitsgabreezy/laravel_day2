<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public $route;
    public $label;
    public $parameter;

    public function __construct($route, $label, $parameter = [])
    {
        $this->route = $route;
        $this->label = $label;
        $this->parameter = $parameter;
    }

    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
