<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Courses\CourseRequest;
use App\Models\Course;
use App\Models\CourseViewed;

class CourseController
{
    public function index()
    {
        $courses = Course::where('is_active', '=', 1)->get();

        return view('courses.opened')
            ->with('courses', $courses);
    }

    public function show(string $slug)
    {
        /** @var Course $course */
        $course = Course::where('slug', '=', $slug)
            ->where('is_active', '=', 1)->with('lessons')->first();

        if (!$course) {
            abort(404);
        }

        CourseViewed::updateOrCreate([
            'course_id' => $course->id,
            'user_id' => auth()->id()
        ]);

        return $course;
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->validated());

        return $course;
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return $course;
    }

    public function delete(Course $course)
    {
        $course->delete();

        return true;
    }
}
