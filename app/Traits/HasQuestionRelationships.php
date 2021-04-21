<?php

namespace App\Traits;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasQuestionRelationships
{
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
