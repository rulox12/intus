<?php

namespace App\Models;

use App\Traits\HasVoteRelationships;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 */
class Vote extends Model
{
    use HasFactory;
    use HasVoteRelationships;

    public function scopeForIndex(Builder $query): Builder
    {
        return $query->where('created_by' , auth()->user()->id);
    }
}

