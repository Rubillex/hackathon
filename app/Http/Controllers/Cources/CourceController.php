<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Cources\CourceStoreRequest;
use App\Http\Requests\Cources\LessonStoreRequest;
use App\Models\Cource;
use App\Models\Lesson;

class CourceController
{
    public function index()
    {
        $cources = Cource::where('is_active', '=', 1)->get();

        return $cources;
    }

    public function show(string $slug)
    {
        $cource = Cource::where('slug', '=', $slug)
            ->where('is_active', '=', 1)->with('lessons')->first();

        if (!$cource) {
            abort(404);
        }

        return $cource;
    }

    public function store(CourceStoreRequest $request)
    {
        $cource = Cource::create($request->validated());

        return $cource;
    }

    public function update(CourceStoreRequest $request)
    {
        $cource = Cource::update($request->validated());

        return $cource;
    }

    public function delete(int $id)
    {
        Cource::findOrFail($id)->delete();

        return true;
    }
}
