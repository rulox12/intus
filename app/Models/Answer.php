<?php

namespace App\Models;

use App\Traits\HasAnswerRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * @property int $id
 * @property string $description
 */
class Answer extends Model
{
    use HasFactory;
    use HasAnswerRelationships;

}

