<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Property extends Model
{
    use HasFactory;

    public function estate(): BelongsTo{
        return $this->belongsTo(Estate::class);
    }
    public function parkades(): HasMany{
        return $this->hasMany(Parkade::class);
    }
    public function contacts(): MorphMany{
        return $this->morphMany(Contact::class,'contactable');
    }
}
