<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
