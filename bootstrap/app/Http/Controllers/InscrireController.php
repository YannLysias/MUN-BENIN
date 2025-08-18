<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Titre;
use App\Models\Quartier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class InscrireController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');
        $username = 'yannlysias'; 

        $response = Http::get("http://api.geonames.org/searchJSON?q=$query&featureCode=PCLI&maxRows=10&username=$username");

        if ($response->ok()) {
            $data = $response->json();
            return response()->json($data['geonames']);
        } else {
            return response()->json(['error' => 'Failed to fetch data from Geoname API'], $response->status());
        }

    }


    public function filter(Request $request)
    {
        if ($request->has('departement_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }

            $usersQuery->where('departement_id', intval($request->query('departement_id')));

            // if ($request->has('commune_id')) {
            //     $usersQuery->where('commune_id', intval($request->query('commune_id')));
            // }

            $users = $usersQuery->get();

            return response()->json($users);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titres = Titre::all();
        $quartiers = Quartier::all();
        $departements = Departement::all();
        $communes = Commune::all();
        $arrondissements = Arrondissement::all();

        return view('inscrire', [
            'titres' => $titres,
            'quartiers' => $quartiers,
            'departements' => $departements,
            'communes' => $communes,
            'arrondissements' => $arrondissements,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'sexe' => 'required|max:255',
            'date_naissance' => 'required|max:255',
            'lieu_naissance' => 'required|max:255',
            'gsanguin' => 'required|max:255',
            'diplome' => 'required|max:255',
            'npi' => 'required|max:255',
            'telephone' => 'required|unique:users,telephone|max:255',
            'email' => 'nullable|email|unique:users,email',
            'profession' => 'required|max:255',
            'commune_id' =>  'required|max:255',
            'departement_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'quartier_id' => 'required|max:255',

        ]);

       
       
        if ($request->statut == 'Diaspora') {
    // Si le statut est "Diaspora", vous pouvez simplement initialiser les variables à null
    $departement = null;
    $commune = null;
    $quartier = null;
    $arrondissement = null;
    } else {
    // Sinon, vous pouvez récupérer les données normalement
    $departement = Departement::findOrFail(intval($request->departement_id));
    $commune = Commune::findOrFail(intval($request->commune_id));
    $quartier = Quartier::findOrFail(intval($request->quartier_id));
    $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));
}
       
        
        $admin = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'type' =>  'Adhérent',
            'email' => $request->email,
            'password' => Null,
            'date_naissance' => $request->date_naissance,
            'lieu_naissance' => $request->lieu_naissance,
            'gsanguin' => $request->gsanguin,
            'diplome' => $request->diplome,
            'profession' => $request->profession,
            'npi' => $request->npi,
            'active' => false,
            'photo' => Null,
            'departement_id' => $departement ? $departement->id : null,
            'commune_id' => $commune ? $commune->id : null,
            'arrondissement_id' => $arrondissement ? $arrondissement->id : null,
            'quartier_id' => $quartier ? $quartier->id : null,
        ]);

        return redirect()->route('welcome')->with('success', 'Votre inscription a été Reçu avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
