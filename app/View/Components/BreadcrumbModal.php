<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BreadcrumbModal extends Component
{
    public $title;
    public $button1;
    public $button2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $button1 = [], $button2 = [])
    {
        //
        $this->title = $title;
        $this->button1 = $button1;
        $this->button2 = $button2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb-modal', ['button1' => $this->button1],['button2' => $this->button2]);
    }
}
