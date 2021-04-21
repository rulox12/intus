<?php

namespace App\Domain\Answer;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateOrUpdateAnswerAction
{
    public static function execute(Request $request, Answer $answer): Answer
    {
        $answer->description = $request->input('description');
        $answer->is_valid = $request->input('is_valid') ?? false;
        $answer->question_id = $request->input('question_id');
        $answer->created_by = Auth::user()->id;

        $answer->save();

        return $answer;
    }
}
