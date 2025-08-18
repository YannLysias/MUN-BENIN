<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrondissement extends Model
{
    protected $guarded = [];
    protected $table = 'arrondissements';

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function quartiers()
    {
        return $this->HasMany(Quartier::class);
    }
}
