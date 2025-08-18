<?php

namespace App\Http\Controllers;

use App\Models\Circonstription;
use Illuminate\Http\Request;

class CirconstriptionController extends Controller
{
    //

    public function getCirconstriptions($departementId)
    {
        $circonstriptions = Circonstription::where('departement_id', $departementId)->pluck('libelle', 'id');
        return response()->json($circonstriptions);
    }
}
