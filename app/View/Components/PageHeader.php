<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public $pagetitle;

    public function __construct($pagetitle)
    {
        $this->pagetitle = $pagetitle;
    }

    public function render(): View|Closure|string
    {
        return view('components.page-header');
    }
}
