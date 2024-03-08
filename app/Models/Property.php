<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Property extends Model
{
    use HasFactory;

    public function contacts(): MorphMany{
        return $this->morphMany(Contact::class,'contactable');
    }
}
