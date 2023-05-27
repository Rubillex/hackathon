<?php

namespace App\View\Components;

use App\Helpers\Math;
use Illuminate\View\Component;

class ProgressBar extends Component
{
    protected int|null $max;
    protected int|null $current;
    protected int|null $percent;
    protected string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $max = null, $current = null, $percent = null)
    {
        $this->max = $max;
        $this->current = $current;
        $this->percent = $percent;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if ($this->percent === null) {
            $this->percent = Math::getPercent($this->max, $this->current);
        }

        return view('components.progress-bar')
            ->with('percent', $this->percent)
            ->with('type', $this->type);
    }
}
