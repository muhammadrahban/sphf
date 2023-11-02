<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSurvey extends Model
{
    use HasFactory;
    protected $table = "user_survey";
    protected $fillable =
    [
        'survey_id',
        'question_id',
        'user_id',
        'selected_answer'
    ];
}
