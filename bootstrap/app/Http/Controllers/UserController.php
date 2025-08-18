<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{

    public function createadminAccount(Request $request)
    {
        $admin = User::where('type', 'Administrateur')->first();

        if($admin)
        {
            return response()->json("L'administrateur avait déja été enregistrer");
        }

        $admin = User::create([
            'nom' => 'KPEDJO',
            'prenom' => 'Guy',
            'sexe' => 'Masculin',
            'telephone' => '0022963053905',
            'email' => 'gkpedjo@gmail.com',
            'type' => 'Administrateur',
            'profession' => 'Informaticien',
            'npi' => '12324546',
            'ravip' => '1234565',
            'password' => 'original22',
            'statut' => false,
            'fonction' => 'Informaticien',
            'titre_id' => '0',
            'departement_id' => '0',
            'commune_id' => '0',
            'arrondissement_id' => '0',
            'quartier_id' => '0',

        ]);

        return response()->json('Le administrateur a été enregistré avec succès');
    }

    /**
     * Display a listing of the resource.
     */
    public function payer(Request $request)
    {
        

        $request->validate([
            'montant' => 'required|numeric',
            'mois' => 'required|string|max:255',
            'telephone' => 'required|string',
            'num_transaction' => 'required|string',
        ]);
        
        $fullPhoneNumber = $request['countryCode'] . $request['telephone'];
        
        $paiement = new Paiement();
        
        $paiement->user_id = auth()->id(); 
        $paiement->montant = $request['montant'];
        $paiement->mois = $request['mois'];
        $paiement->num_transaction = $request['num_transaction'];
        $paiement->telephone = $request['telephone'];
        $paiement->telephone = $fullPhoneNumber;
       

        // Sauvegarder dans la base de données
        $paiement->save();

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Paiement réussi et enregistré !');

        // Logique de traitement de paiement via un service de paiement
        // Par exemple, Stripe, PayPal, etc.
        // ...
        return redirect()->back()->with('success', 'Paiement réussi !');

        // Sinon, retourne une erreur
        // return redirect()->back()->with('error', 'Erreur lors du paiement');
    }




    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
