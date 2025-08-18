<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $guarded = [];
    protected $table = 'communes';

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function arrondissements()
    {
        return $this->HasMany(Arrondissement::class);
    }
}
