<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = [
        'name',
        'description',
        'year',
        'exists',
        'user_id',
    ];
}
