<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Courses\CourceRequest;
use App\Models\Course;
use App\Models\CourseViewed;

class CourseController
{
    public function index()
    {
        $cources = Course::where('is_active', '=', 1)->get();

        return $cources;
    }

    public function show(string $slug)
    {
        /** @var Course $cource */
        $cource = Course::where('slug', '=', $slug)
            ->where('is_active', '=', 1)->with('lessons')->first();

        if (!$cource) {
            abort(404);
        }

        CourseViewed::updateOrCreate([
            'course_id' => $cource->id,
            'user_id' => auth()->id()
        ]);

        return $cource;
    }

    public function store(CourceRequest $request)
    {
        $cource = Course::create($request->validated());

        return $cource;
    }

    public function update(CourceRequest $request, Course $cource)
    {
        $cource->update($request->validated());

        return $cource;
    }

    public function delete(Course $cource)
    {
        $cource->delete();

        return true;
    }
}
