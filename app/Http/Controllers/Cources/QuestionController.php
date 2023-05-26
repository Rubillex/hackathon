<?php

namespace App\Http\Controllers\Cources;

use App\Http\Requests\Cources\QuestionRequest;
use App\Models\Question;

class QuestionController
{
    public function show(Question $question)
    {
        return $question;
    }

    public function store(QuestionRequest $request)
    {
        $question = Question::create($request->validated());

        return $question;
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return $question;
    }

    public function delete(Question $question)
    {
        $question->delete();

        return true;
    }
}
