<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Circonstription;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Paiement;
use App\Models\Quartier;
use App\Models\Titre;
use App\Models\User;
use App\Notifications\NewCollaborateur;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class adherantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (auth()->user()->type === 'Coordonnateur') {
            $users = User::whereNotIn('type', ['Coordonnateur', 'Administrateur'])
            ->where('quartier_id', Auth::user()->quartier_id)
            ->orderBy('id', 'desc')
            ->get();

        } elseif (auth()->user()->type === 'Administrateur') {
            $users = User::whereIn('type', ['Adhérent'])
            ->latest()
            ->orderBy('id', 'desc')
            ->get();
        } else {
            // Les autres types d'utilisateurs ne peuvent pas voir les coordonnateurs
            $users = [];
            $users = User::orderBy('id', 'desc')->get();
        }
        $departements = Departement::all();

        return view('adherant', [
            'adherants' => $users,
            'quartiers' => [],
            'departements' => $departements,
            'communes' => [],
            'arrondissements' => [],
            'circonscriptions' => [],

        ]);
    }

    public function generatePDF()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->setBasePath(public_path());

        // Récupérez l'utilisateur connecté
        $user = Auth::user();

        // Définissez une variable pour stocker les adhérents
        $adherants = null;

        // Vérifiez le type d'utilisateur
        if ($user->type === 'Coordonnateur') {
            // Si l'utilisateur est un coordonnateur, récupérez les adhérents de son quartier
            $adherants = User::where('quartier_id', $user->quartier_id)
                             ->where('type', 'Adhérent')
                             ->orderBy('nom') // Tri par ordre alphabétique du nom
                             ->get();
        } elseif ($user->type === 'Administrateur') {
            // Si l'utilisateur est un administrateur, récupérez tous les adhérents et les coordinateurs
            $adherants = User::where('type', 'Adhérent')
                            //  ->orWhere('type', 'Coordonnateur')
                             ->orderBy('nom') // Tri par ordre alphabétique du nom
                             ->get();
        }

        // Générez le contenu HTML du tableau
        $html = view('pdf', compact('adherants'))->render();

        // Chargez le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Définissez les options de rendu et générez le PDF
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Envoyez le PDF à la sortie
        return $dompdf->stream("liste_adhérents.pdf");
    }

    public function filter(Request $request)
    {
        if ($request->has('departement_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('departement_id', intval($request->query('departement_id')));
            $users = $usersQuery->get();

            return response()->json($users);
        }

        if ($request->has('circonscription_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('circonscription_id', intval($request->query('circonscription_id')));
            $users = $usersQuery->get();

            return response()->json($users);
            }

        if ($request->has('commune_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('commune_id', intval($request->query('commune_id')));
            $users = $usersQuery->get();

            return response()->json($users);
        }

        if ($request->has('arrondissement_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('arrondissement_id', intval($request->query('arrondissement_id')));
            $users = $usersQuery->get();

            return response()->json($users);
        }

        if ($request->has('quartier_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('quartier_id', intval($request->query('quartier_id')));
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
        $circonscriptions = Circonstription::all();
        $departements = Departement::all();
        $communes = Commune::all();
        $arrondissements = Arrondissement::all();

        return view('ajout_adherant', [
            'titres' => $titres,
            'quartiers' => $quartiers,
            'departements' => $departements,
            'circonscriptions' => $circonscriptions,
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
            'npi' => 'nullable|max:255',
            'telephone' => 'required|unique:users,telephone|max:255',
            'email' => 'nullable|email|unique:users,email',
            'profession' => 'required|max:255',
            'commune_id' =>  'required|max:255',
            'circonscription_id' =>  'required|max:255',
            'departement_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'quartier_id' => 'required|max:255',
        ]);

        $quartierId = $request->quartier_id;
        if($request->type == "Coordonnateur"){
            $users = User::where('quartier_id', $quartierId)->where('type', "Coordonnateur")->get();

        if ($users->count() > 0) {
            return back()->withErrors(['quartier_id' => "Un coordonnateur existe déjà dans ce quartier"]);
        }

        }
        $path_photo_convert_to_table = null;
        if ($request->hasFile('photo')) {
            // Valider et stocker la photo
            $path_photo = $request->file('photo')->store('public/photos');
            $path_photo_convert_to_table = explode('/', $path_photo);
        }
        // $path_photo = Storage::putFile('public/photos', $request->photo);
        // $path_photo_convert_to_table = explode('/', $path_photo);

        // if ($request->has('photo')) {
        //     $path_photo = Storage::putFile('public/photos', $request->photo);
        //     $path_photo_convert_to_table = explode('/', $path_photo);
        // }



        if ($request->categorie == 'Diaspora') {
            // Si le statut est "Diaspora", vous pouvez simplement initialiser les variables à null
            $departement = null;
            $commune = null;
            $quartier = null;
            $arrondissement = null;
            $titre = null;
        } else {
            // Sinon, vous pouvez récupérer les données normalement
            $departement = Departement::findOrFail(intval($request->departement_id));
            $commune = Commune::findOrFail(intval($request->commune_id));
            $quartier = Quartier::findOrFail(intval($request->quartier_id));
            $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));
            $circonscriptions = Circonstription::findOrFail(intval($request->circonscription_id));
            $titre = Titre::find(intval($request->titre_id));

        }



        if($request->type=='Coordonnateur')
            $generated_password = Str::random(8);


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
                'whatsap' => $request->whatsap,
                'occupation' => $request->occupation,
                'photo' => $path_photo_convert_to_table ? $path_photo_convert_to_table[2] : null,
                'titre_id' => $titre ? $titre->id : null,
                'departement_id' => $departement ? $departement->id : null,
                'commune_id' => $commune ? $commune->id : null,
                'arrondissement_id' => $arrondissement ? $arrondissement->id : null,
                'quartier_id' => $quartier ? $quartier->id : null,
                'circonscription_id' => $circonscriptions ? $circonscriptions->id : null,
        ]);

        if($request->type=='Coordonnateur')
        {
            $admin->password = $generated_password;
            $admin->save();

            Notification::send($admin, new NewCollaborateur([
                'email' => $admin->email,
                'nom' => $admin->nom,
                'password' => $generated_password,
            ]));
        }

        return redirect('adherant')->with('success', $admin->nom . ' ' . 'Votre inscription a été Reçu avec succès');
    }

    public function validateUser($userId)
    {

        $user = User::find($userId);
        if ($user) {

            $user->active = true;
            $generated_password = Str::random(8);
            $user->password = $generated_password;
            $user->save();

            if ($user->type === 'Adhérent') {
                Notification::send($user, new NewCollaborateur([
                    'email' => $user->email,
                    'nom' => $user->nom,
                    'password' => $generated_password,
                ]));
            }

            return redirect()->back()->with('success', 'L\'utilisateur a été activé avec succès.');
        }

        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        // Récupérisateur en fonction de l'ID fourni
        // $user = User::with('quartier')->findOrFail($id);ez l'util
        $user = User::findOrFail($id);

        // Passez les détails de l'utilisateur à la vue
        return view("users-profile", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $adherant = User::where('id', (int) $id)->first();
        $titres = Titre::all();
        $quartiers = Quartier::all();
        $departements = Departement::all();
        $communes = Commune::all();
        $arrondissements = Arrondissement::all();
        $circonscriptions = Circonstription::all();


        return view('edit-adherant', compact('adherant', 'titres', 'quartiers', 'departements', 'communes', 'circonscriptions', 'arrondissements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'sexe' => 'required|max:255',
            'date_naissance' => 'required|max:255',
            'lieu_naissance' => 'required|max:255',
            'gsanguin' => 'required|max:255',
            'diplome' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'nullable|email|',
            'profession' => 'required|max:255',
            'photo' => 'nullable|mimes:jpg,png,jpeg',
            'titre_id' => 'nullable|max:255',
            'quartier_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'departement_id' => 'required|max:255',
            'commune_id' => 'required|max:255',
        ]);

        $adherant = User::where('id', (int) $id)->first();


        $titre = Titre::find(intval($request->titre_id));

        $departement = Departement::findOrFail(intval($request->departement_id));
        $commune = Commune::findOrFail(intval($request->commune_id));
        $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));
        $circonscription = Circonstription::findOrFail(intval($request->circonscription_id));
        $quartier = Quartier::findOrFail(intval($request->quartier_id));


        // Stocker l'ancien type avant la modification
        $ancien_type = $adherant->type;

        // Mettre à jour les informations de l'adhérent
        $adherant->nom = $request->nom;
        $adherant->prenom = $request->prenom;
        $adherant->sexe = $request->sexe;
        $adherant->telephone = $request->telephone;
        $adherant->type = $request->type;
        $adherant->email = $request->email;
        $adherant->profession = $request->profession;
        $adherant->npi = $request->npi;
        $adherant->titre_id = $titre ? $titre->id : null;
        $adherant->photo = $request->photo ? $request->photo : null;
        $adherant->quartier_id = $quartier->id;
        $adherant->departement_id = $departement->id;
        $adherant->arrondissement_id = $arrondissement->id;
        $adherant->circonscription_id = $circonscription->id;
        $adherant->commune_id = $commune->id;

        if ($request->hasFile('photo')) {
            // Valider et stocker la photo
            $path_photo = $request->file('photo')->store('public/photos');
            $path_photo_convert_to_table = explode('/', $path_photo);

            $existing_photo_path = 'public/photos/' . $adherant->photo;
            if (Storage::exists($existing_photo_path)) {
                Storage::delete($existing_photo_path);
            }

            $adherant->photo = $request->has('photo') ? $path_photo_convert_to_table[2] : null;
        }

        // Vérifier si le type est changé en "Coordonnateur"
        if ($ancien_type != 'Coordonnateur' && $request->type == 'Coordonnateur') {
            // Générer un nouveau mot de passe
            $generated_password = Str::random(8); // Générer un mot de passe aléatoire de 8 caractères

            // Mettre à jour le mot de passe de l'utilisateur
            $adherant->password = Hash::make($generated_password);
            $adherant->save();

            // Envoyer un e-mail à l'utilisateur avec son nouveau mot de passe
            Notification::send($adherant, new NewCollaborateur([
                'email' => $adherant->email,
                'nom' => $adherant->nom,
                'password' => $generated_password,
            ]));
        } else {
            // Sauvegarder les autres modifications si le type n'a pas changé
            $adherant->save();
        }




        return redirect()->route('adherant.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adherant = User::findOrFail($id);
        $adherant->delete();

        return redirect()->back()->with('success', $adherant->type . ' '. $adherant->nom . ' ' . $adherant->prenom . ' a été supprimé avec succès.');
    }
}
