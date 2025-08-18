<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    protected $guarded = [];
    protected $table = 'titres';

    public function users()
    {
        return $this->HasMany(User::class);
    }
}
