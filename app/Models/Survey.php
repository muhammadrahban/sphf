<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = "survey";
    protected $fillable =
    [
        'id',
        "name",
        "subtitle",
        "image_url",
        "description",
        "fdp",
        "status",
    ];
    /**
     * Get all of the comments for the Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
