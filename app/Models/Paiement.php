<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'paiements';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
