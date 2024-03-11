<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $appends=['blocks'];

    public function getBlocksAttribute(){
        return $this->properties->count();
        
    }
    public function parkades(): HasMany{
        return $this->hasMany(Parkade::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }

}
