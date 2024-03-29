<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    protected $title;
    protected $description;
     public function __construct($title = null, $description = null) {
        $this->title = is_null($title) ? "Alumni Ilmu Komputer" : "$title | Alumni Ilmu Komputer";
        $this->description = is_null($description)? "Alumni Ilmu Komputer" : $description;
     }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth-layout',[
            'title' => $this->title,
            'description' => $this->description
        ]);
    }
}
