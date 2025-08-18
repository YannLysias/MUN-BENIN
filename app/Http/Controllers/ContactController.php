<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|max:255',
            'subjection' => 'required|max:255',
            'commentaire' => 'required|max:255',

        ]);


        $admin = Contact::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'subjection' => $request->subjection,
            'commentaire' => $request->commentaire,

        ]);

        return redirect()->route('contact.create')->with('success', 'Formulaire soumis avec succès!');

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
