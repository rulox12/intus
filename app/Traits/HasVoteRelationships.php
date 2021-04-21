<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasVoteRelationships
{
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }
}
