<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $fillable = [

        'title',
        'subtitle',
        'values',
        'image',
        'description',
        'status',

    ];

    public function getValuesAttribute($value)
    {
        return json_decode($value);
    }
}
