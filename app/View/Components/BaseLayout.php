<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BaseLayout extends Component
{
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null)
    {
        $this->title = $title ?? config('app.name', 'Laravel');
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.base');
    }
}
