<?php

namespace Modules\Property\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PerformanceReport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('property::components.performancereport');
    }
}
