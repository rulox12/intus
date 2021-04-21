<?php

namespace App\Traits;


use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAnswerRelationships
{
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
