<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Departement;
use App\Models\Paiement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class AutreController extends Controller
{
    public function welcome()
    {

        // Récupérer tous les départements
        $departements = Departement::all();
        $totalUser = User::all()->count();
        $totalAdherants = User::where('type', 'Adhérent')->count();
        $totalCoordonnateur = User::where('type', 'Coordonnateur')->count();
        $totalDiaspora = User::where('categorie', 'Diaspora')->count();

        // Parcourir chaque département et compter le nombre d'adhérents associés
        foreach ($departements as $departement) {

            $nombre_adherents =  User::where('departement_id', $departement->id)->where('type', 'Adhérent' )->count();

            $departement['nombre_adherents'] = $nombre_adherents;
        }

        // Passer les données à la vue
        return view('welcome', compact('departements', 'totalAdherants', 'totalDiaspora', 'totalCoordonnateur', 'totalUser'));
    }

    public function contactIndex()
    {
        $contacts = Contact::all();

        return view('contact');
    }




    public function dashboard()
    {

        // Récupérer tous les départements
        $departements = Departement::all();
        $totalUser = User::all()->count();
        $totalAdherants = User::where('type', 'Adhérent')->count();
        $totalCoordonnateur = User::where('type', 'Coordonnateur')->count();
        $totalDiaspora = User::where('categorie', 'Diaspora')->count();

        // Parcourir chaque département et compter le nombre d'adhérents associés
        foreach ($departements as $departement) {

            $nombre_adherents =  User::where('departement_id', $departement->id)->where('type', 'Adhérent' )->count();

            $departement['nombre_adherents'] = $nombre_adherents;
        }

        $paiements = Paiement::where('user_id', auth()->id())->get(); // Pour l'utilisateur connecté
        // Pour l'administrateur, vous pouvez récupérer tous les paiements
        // $paiements = Paiement::all();
        // Passer les données à la vue
        return view('dashboard', compact('departements', 'paiements', 'totalAdherants', 'totalDiaspora', 'totalCoordonnateur', 'totalUser'));
    }
}
