<?php

namespace App\View\Components;

use App\Helpers\WordHelper;
use App\Models\Course;
use Illuminate\View\Component;

class CourseCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        protected Course $course
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $lessonsTextform = WordHelper::getWordForm(count($this->course->lessons), ['лекция', 'лекции', 'лекций']);
        return view('components.course-card')
            ->with('course', $this->course)
            ->with('lessonsTextform', $lessonsTextform);
    }
}
