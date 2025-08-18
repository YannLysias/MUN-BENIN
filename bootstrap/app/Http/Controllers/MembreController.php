<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MembreController extends Controller
{
    public function genererCarteAdhesion($id)
    {
        $member = User::findOrFail($id);

        // Générer le PDF à partir de la vue
        $pdf = Pdf::loadView('carte_adhesion', compact('member'));

        // Télécharger le PDF
        return $pdf->download('carte_adhesion_'.$member->id.'.pdf');
    }
}
