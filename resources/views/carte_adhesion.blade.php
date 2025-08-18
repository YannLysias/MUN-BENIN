<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte d'Adhésion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            width: 380px;
            height: 260px;
            border: 2px solid #000;
            background-color: #e7f2ea;
            border-radius: 5px;
            padding: 10px;
            position: relative;
            color: #000;
            box-sizing: border-box;
            /* background-image: url('img/Africa.png'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.9;
        }

        .header {
            text-align: center;
            margin-bottom: 5px;
        }
        .header .title {
            font-weight: bold;
            font-size: 16px;
        }
        .header .subtitle {
            font-size: 14px;
        }
        .header .line {
            width: 80%;
            margin: 10px auto;
            border-bottom: 2px solid #000;
        }
        .photo {
            width: 80px; /* Taille de la photo */
            height: 80px; /* Taille de la photo */
            position: absolute;
            right: 10px; /* Position à droite */
            top: 80px; /* Ajuste cette valeur pour aligner verticalement */
            object-fit: cover;
            border-radius: 5px; /* Bordure arrondie */
            border: 2px solid #fff; /* Bordure blanche pour démarquer la photo */
        }
        .content {
            margin-top: 10px;
            padding-left: 10px;
            padding-right: 120px; /* Laisse de l'espace pour la photo */
            box-sizing: border-box;
        }
        .content p {
            margin: 2px 0;
            font-size: 12px;
        }
        small {
            text-align: left;
            font-size: 10px;
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #660606;
        }
        .image {
            width: 40px;
            height: 40px;
            position: absolute;
            left: 10px;
            object-fit: cover;
        }
        .footer {
            text-align: left;
            font-size: 10px;
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: #000;
        }
        .admin-photo {
            width: 60px; /* Taille de la photo de l'administrateur */
            height: 60px;
            position: absolute;
            right: 10px;
            bottom: 40px; /* Ajuste cette valeur pour la placer au-dessus de la signature */
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #fff;
        }
        .admin-signature {
            width: 70px; /* Taille de la photo de l'administrateur */
            height: 70px;
            position: absolute;
            right: 10px;
            bottom: 10px;
            text-align: center;
            font-size: 10px;
            color: #000;
        }
        .admin-signature img {
            width: 40px; /* Taille de la photo de l'administrateur */
            height: 40px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        .admin-signature p {
            margin: 0;
        }
    </style>
    @php
        use Carbon\Carbon;
        $dateAdhesion = $member->created_at;
        $dateExpiration = Carbon::parse($dateAdhesion)->addYears(3);
    @endphp
</head>
<body>
    <div class="card">
        <!-- Nom du parti et titre de la carte d'adhésion -->
        <div class="header">
            <div class="title"> <img src="assets/img/mpa-remove.png" alt="Image à gauche" class="image" ></div>

                @if ($member->sexe === 'Feminin')
                    <!-- Afficher une image spécifique pour les utilisateurs de sexe féminin -->
                    <div class="title"> <img src="img/fille.jpg" alt="Image à gauche" class="photo"> Mouvement des Peuples Africains</div>
                @else
                    <!-- Afficher une image par défaut ou un avatar -->
                    <div class="title"> <img src="img/images.png" alt="Image à droit" class="photo"> Mouvement des Peuples Africains</div>
                @endif

            <div class="line"></div>
            <div class="subtitle">Carte d'Adhésion</div>
        </div>

        <!-- Détails de l'adhérent -->
        <div class="content">
            <p><strong>Type :</strong> {{ $member->type }}</p>
            <p><strong>Nom(s) :</strong> {{ $member->nom }}</p>
            <p><strong>Prénom(s) :</strong> {{ $member->prenom }}</p>
            <p><strong>Né(e) le :</strong> {{ \Carbon\Carbon::parse($member->date_naissance)->format('d/m/Y') }} à {{ $member->lieu_naissance }}</p>
            <p><strong>Sexe :</strong> {{ $member->sexe }}</p>
            <p><strong>Profession :</strong> {{ $member->profession }}</p>
            <p><strong>Téléphone :</strong> {{ $member->telephone }}</p>
            <p><strong>Groupe sanguin :</strong> {{ $member->gsanguin }}</p>
            @if($member->titre)
                <p><strong>Titre :</strong> {{ $member->titre->libelle }}</p>
            @endif
            <small>Période de validité: <br> {{ $dateAdhesion->format('d/m/Y') }} au {{ $dateExpiration->format('d/m/Y') }}</small>
        </div>

        <!-- Photo, signature et nom de l'administrateur -->
        <div class="admin-signature">
            <p>President</p>
            <img src="img/admin_signature.png" alt="Signature de l'administrateur">
            <p>Guy KPEDJO</p>
        </div>
    </div> <br>


    <div class="card">
        <div class="header">
            <img src="img/drapeaux.png" alt="Drapeau" style="width: 40px; height: 40px;">
            <div class="title">RÉPUBLIQUE DU BÉNIN</div>
            <p>FRATERNITÉ * TRAVAIL * JUSTICE</p>
            <p>Mouvement des Peuples Africains</p>
        </div>

        <div class="content">
            @if($member->quartier && $member->quartier->arrondissement && $member->quartier->arrondissement->commune && $member->quartier->arrondissement->commune->departement)
                <p><strong>Département :</strong> {{ $member->quartier->arrondissement->commune->departement->libelle }}</p>
            @endif
            @if($member->quartier && $member->quartier->arrondissement && $member->quartier->arrondissement->commune && $member->quartier->arrondissement->commune->circonstription)
                <p><strong>Circonscription :</strong> {{ $member->quartier->arrondissement->commune->circonstription->libelle }}</p>
            @endif
            @if($member->quartier && $member->quartier->arrondissement && $member->quartier->arrondissement->commune)
                <p><strong>Commune :</strong> {{ $member->quartier->arrondissement->commune->libelle }}</p>
            @endif
            @if($member->quartier && $member->quartier->arrondissement)
                <p><strong>Arrondissement :</strong> {{ $member->quartier->arrondissement->libelle }}</p>
            @endif
            @if($member->quartier)
                <p><strong>Quartier :</strong> {{ $member->quartier->libelle }}</p>
            @endif
        </div>
    </div>
</body>
</html>
