<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circonstription extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'circonstriptions';

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function communes()
    {
        return $this->HasMany(Commune::class);
    }
}



