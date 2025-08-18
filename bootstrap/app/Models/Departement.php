<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $guarded = [];
    protected $table = 'departements';

    public function communes()
    {
        return $this->HasMany(Commune::class);
    }
}
