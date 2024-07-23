<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class victim extends Model
{
    use HasFactory;
     protected $fillable = [
        'uuid',
        'filled_da_form_id',
        'da_cnic',
        'da_occupant_name',
        'gender',
        'district',
        'tehsil',
        'union_council',
        'deh',
        'widows',
        'women_with_disable_husband',
        'divorced_abandoned_unmarried_older_dependent_on_others',
        'people_with_disability_physically_or_mentally',
        'unaccompained_minors_i_e_orphans',
        'unaccompained_elders_over_the_age_of_60',
    ];
}
