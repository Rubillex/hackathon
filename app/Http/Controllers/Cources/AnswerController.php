<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Cources\AnswerRequest;
use App\Models\Answer;

class AnswerController
{
    public function store(AnswerRequest $request)
    {
        $answer = Answer::create($request->validated());

        return $answer;
    }
}
