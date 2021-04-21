<?php

namespace App\Domain\Vote;

use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class CreateOrUpdateVoteAction
{
    public static function execute(int $questionId, int $answerId ): Vote
    {
        $vote = new Vote();
        $vote->question_id = $questionId;
        $vote->answer_id = $answerId;
        $vote->created_by = Auth::user()->id;

        $vote->save();

        return $vote;
    }
}
