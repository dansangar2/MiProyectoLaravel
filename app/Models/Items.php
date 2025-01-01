<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Items extends Model
{
    protected $fillable = [
        'name',
        'description',
        'year',
        'exists',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
