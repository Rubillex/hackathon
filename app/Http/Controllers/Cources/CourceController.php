<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Cources\CourceRequest;
use App\Models\Cource;

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

    public function store(CourceRequest $request)
    {
        $cource = Cource::create($request->validated());

        return $cource;
    }

    public function update(CourceRequest $request, Cource $cource)
    {
        $cource->update($request->validated());

        return $cource;
    }

    public function delete(Cource $cource)
    {
        $cource->delete();

        return true;
    }
}