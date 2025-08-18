<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/mpa.jpeg">

    <title>MPA Bénin </title>

    <!-- Bootstrap -->
    <link href="/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">

              </div>
              <div class="profile_info">

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('layouts.sidebar')

        <!-- top navigation -->

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Profile</h3>
                    </div>
                </div>
                <div class="clearfix"></div>

                <section class="section profile">
                    <div class="row">
                      <div class="col-xl-4">
                        <div class="card">
                          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if ($user->photo)
                                <img src="{{ asset('storage/photos/' . $user->photo) }}" style="width: 80px; height: 80px;" alt="Profile" class="rounded-circle profile-picture">
                            @else
                                @if ($user->sexe === 'Feminin')
                                    <!-- Afficher une image spécifique pour les utilisateurs de sexe féminin -->
                                    <img src="/img/fille.jpg" style="width: 80px; height: 80px;" alt="Femme Avatar" class="rounded-circle profile-picture">
                                @else
                                    <!-- Afficher une image par défaut ou un avatar -->
                                    <img src="/img/images.png" style="width: 80px; height: 80px;" alt="Homme Avatar" class="rounded-circle profile-picture">
                                @endif
                            @endif
                            <h2>{{ $user->nom }} {{ $user->prenom }}</h2>
                            <h3>{{ $user->type }}</h3>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-8">

                        <div class="card">
                          <div class="card-body pt-3">

                            <div class="tab-content pt-2">

                              <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label ">Nom et Prénom(s)</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->nom }} {{ $user->prenom }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Sexe</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->sexe }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Date de naissance</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->date_naissance }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Lieu de naissance</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->lieu_naissance }}</div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Groupe sanguin</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->gsanguin }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Email</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->telephone }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Diplome</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->diplome }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Type</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->type }}</div>
                                </div>


                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Profession</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->profession }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Occupation</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->occupation }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">NPI</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->npi }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Numéro whatsapp</div>
                                  <div class="col-lg-9 col-md-8">{{ $user->whatsap }}</div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Titre</div>
                                  @if($user->titre)
                                  <div class="col-lg-9 col-md-8">{{ $user->titre->libelle }}</div>
                                  @else
                                      Membre
                                  @endif
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Département</div>
                                  @if($user->quartier && $user->quartier->arrondissement && $user->quartier->arrondissement->commune && $user->quartier->arrondissement->commune->departement)
                                      <div class="col-lg-9 col-md-8">{{ $user->quartier->arrondissement->commune->departement->libelle }}</div>
                                  @endif
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Circonstription electorale </div>
                              @if($user->quartier && $user->quartier->arrondissement && $user->quartier->arrondissement->commune && $user->quartier->arrondissement->commune->circonstription)
                                <div class="col-lg-9 col-md-8"> {{ $user->quartier->arrondissement->commune->circonstription->libelle }}</div>
                              @endif
                            </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Commune</div>
                                @if($user->quartier && $user->quartier->arrondissement && $user->quartier->arrondissement->commune)
                                    <div class="col-lg-9 col-md-8">{{ $user->quartier->arrondissement->commune->libelle }}</div>
                                @endif
                            </div>

                            <div class="row">
                              <div class="col-lg-3 col-md-4 label">Arrondissement</div>
                              @if($user->quartier && $user->quartier->arrondissement)
                                  <div class="col-lg-9 col-md-8">{{ $user->quartier->arrondissement->libelle }}</div>
                              @endif
                          </div>

                          <div class="row">
                            <div class="col-lg-3 col-md-4 label">Quartier</div>
                            @if($user->quartier)
                                <div class="col-lg-9 col-md-8">{{ $user->quartier->libelle }}</div>
                            @endif
                        </div>
                        <a href="{{ route('membre.carte', $user->id) }}" class="btn btn-primary">Générer Carte d'Adhésion</a>
                              </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                              <!-- Change Password Form -->


                        </div>
                      </div>

                    </div>
                  </div>
                </section>

            </div>
        </div>
        <!-- page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
              &copy; 2024 Mouvement des Peuples Africains <strong></strong>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../vendors/validator/multifield.js"></script>
<script src="../vendors/validator/validator.js"></script>

<!-- Javascript functions	-->
<script>
    function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
</script>

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);

</script>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- validator -->
<!-- <script src="../vendors/validator/validator.js"></script> -->

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>

</body>

</html>
