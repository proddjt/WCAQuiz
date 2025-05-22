<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['wca_id', 'name', 'country', 'numberOfCompetitions', 'numberOfChampionships', 'rank', 'medals', 'records'];
    protected $casts = [
        'rank' => 'array',
        'medals' => 'array',
        'records' => 'array',
    ];
}
