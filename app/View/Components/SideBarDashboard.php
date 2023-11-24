<?php

namespace App\View\Components;

use Closure;
use App\Models\Event;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SideBarDashboard extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.partials.sidebar');
    }
}
