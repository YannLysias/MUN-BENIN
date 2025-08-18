<?php

namespace App\Http\Controllers;

use App\Models\Titre;
use App\Models\User;
use Illuminate\Http\Request;

class TitreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titres = Titre::all();
        return view('titre', [
            'titres' => $titres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajout_titre');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'libelle' => 'required|max:255',
            //'user_id' => 'required|max:255',
        ]);
    
        // Créer un nouveau titre
        $titre = Titre::create([
            'libelle' => $request->libelle,
            //'user_id' => $request->user_id,
        ]);
    
        return redirect('titre');
        // $users = User::where('titre_id', $titre->id)->get();
    
        // return view('titre', ['users' => $users]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titre = Titre::findOrFail($id);
        $adherents = $titre->users;
    
        return view('titre_user', compact('titre', 'adherents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titre = Titre::where('id', (int) $id)->first();

        return view('edit_titre', compact('titre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            //'user_id' => 'required|max:255',
           
        ]);
        $titres = Titre::where('id', (int) $id)->first();

        $titres ->libelle = $request->libelle;
       // $titres ->user_id = $request->user_id;

        $titres -> save();

        return redirect()->route('titre.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $titre = Titre::findOrFail($id);
        $titre->delete();

        return redirect()->back()->with('success', 'Titre a été supprimé avec succès.');
    }
}
