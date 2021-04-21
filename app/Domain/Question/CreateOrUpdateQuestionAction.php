<?php

namespace App\Domain\Question;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateOrUpdateQuestionAction
{
    public static function execute(Request $request, Question $question): Question
    {
        $question->description = $request->input('description');
        $question->created_by = Auth::user()->id;

        $question->save();

        return $question;
    }
}
