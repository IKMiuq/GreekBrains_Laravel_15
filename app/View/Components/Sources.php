<?php

namespace App\View\Components;

use App\Models\Source;
use Illuminate\View\Component;
use function view;

class Sources extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sources', ['data' => Source::all()]);
    }
}
