<?php

namespace App\Http\Controllers\Cources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cources\LessonRequest;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::where('is_active', '=', 1)->get();

        return $lessons;
    }

    public function show(string $slug)
    {
        $lesson = Lesson::where('slug', '=', $slug)
            ->where('is_active', '=', 1)->with('questions')->first();

        if (!$lesson) {
            abort(404);
        }

        return $lesson;
    }

    public function store(LessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());

        return $lesson;
    }

    public function update(LessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return $lesson;
    }

    public function delete(Lesson $lesson)
    {
        $lesson->delete();

        return true;
    }
}
