<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReward extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'reward_id',
        'user_id',
        'status',
        'fdp'

    ];
}
