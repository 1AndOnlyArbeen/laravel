<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'gateUser_id',
    ];

    public function gateUser(): BelongsTo
    {
        return $this->belongsTo(GateUser::class, 'gateUser_id');
    }
}
