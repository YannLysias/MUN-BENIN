<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaspora extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'diasporas';
}
