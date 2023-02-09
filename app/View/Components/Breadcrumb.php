<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $button;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $button = [])
    {
        $this->title = $title;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb', ['button' => $this->button]);
    }
}
