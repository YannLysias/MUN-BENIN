<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quartier extends Model
{
    protected $guarded = [];
    protected $table = 'quartiers';
    
    public function users()
    {
        return $this->HasMany(User::class);
    }

    public function arrondissement()
    {
        return $this->belongsTo(Arrondissement::class);
    }
}
