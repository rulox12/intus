<?php

namespace App\Models;

use App\Traits\HasQuestionRelationships;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 */
class Question extends Model
{
    use HasFactory;
    use HasQuestionRelationships;

    public function scopeForIndex(Builder $query): Builder
    {
        return $query->where('created_by' , auth()->user()->id);
    }
}

