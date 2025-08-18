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
  <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom Theme Style -->
  <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<style>
    .welcome-message {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff; /* Vert foncé */
        border-radius: 10px; /* Coins légèrement arrondis */
        text-align: center; /* Centrer le texte horizontalement */
        max-width: 600px; /* Limiter la largeur du bloc */
        margin: 0 auto; /* Centrer le bloc horizontalement */
        color: #73879C; /* Couleur du texte en blanc pour un bon contraste */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre pour un effet de profondeur */
    }
    .welcome-message h3 {
        margin-top: 0;
        color: #73879C; /* Couleur du titre en blanc */
    }
    .welcome-message p {
        text-align: justify; /* Justifier le texte pour une meilleure lisibilité */
        margin-top: 15px; /* Ajouter un espace entre le titre et le paragraphe */
        color: #73879C; /* Couleur du paragraphe en vert clair */
    }
</style>

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
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">

            <div class="container" style="text-align: center;">
              <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-users"></i></div>
                      <div class="count">{{$totalAdherants}}</div>
                      <h4>Adhérent{{$totalAdherants > 1 ? 's' : ''}} </h4>
                      <p></p>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-globe"></i></div>
                      <div class="count">{{$totalDiaspora}}</div>
                      <h4>Diaspora{{$totalDiaspora > 1 ? 's' : ''}}</h4>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-user"></i></div>
                      <div class="count">{{$totalCoordonnateur}}</div>
                      <h4>Coordonnateur{{$totalCoordonnateur > 1 ? 's' : ''}}</h4>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-file"></i></div>
                      <div class="count">{{$totalUser}}</div>
                      <h4>Total d'enregistrement</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- @if (Auth::user()->role == "ChefService" || Auth::user()->role == "Stagiaire") --}}
                <section class="content">
                    <div class="container-fluid">

                        <!-- Section de bienvenue -->
                        <div class="welcome-message">
                            <h3>Bienvenue, {{ auth()->user()->nom }}!</h3>
                            <p>Nous sommes ravis de vous voir sur votre tableau de bord MPA. etc....... </p>
                        </div>

                    </div>
                </section>


                <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="paymentForm" action="{{ route('cotisation.payer') }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="paymentModalLabel">Paiement de Cotisation</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Champs du formulaire de paiement -->
                                    <div class="form-group">
                                        <label for="montant">Montant :</label>
                                        <input type="number" class="form-control" id="montant" name="montant" required>
                                        @error('montant')
                                            <div class="d-block text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="num">Numéro de téléphone :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control" id="countryCode" name="countryCode" >
                                                    <option value="+229" selected>+229</option>
                                                </select>
                                            </div>
                                            <input type="number" class="form-control" id="num" name="telephone" required>
                                            @error('telephone')
                                                <div class="d-block text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mois">Mois :</label>
                                        <select name="mois" id="mois" class="form-control" required>
                                            <option value="" disabled selected>Choississez le mois de paiement</option>
                                            <option value="Janvier">Janvier</option>
                                            <option value="Février">Février</option>
                                            <option value="Mars">Mars</option>
                                            <option value="Avril">Avril</option>
                                            <option value="Mai">Mai</option>
                                            <option value="Juin">Juin</option>
                                            <option value="Juillet">Juillet</option>
                                            <option value="Aout">Aout</option>
                                            <option value="Septembre">Septembre</option>
                                            <option value="Octobre">Octobre</option>
                                            <option value="Novembre">Novembre</option>
                                            <option value="Décembre">Décembre</option>
                                        </select>
                                        @error('mois')
                                            <div class="d-block text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="paymentMethod">Méthode de Paiement :</label>
                                        <div class="d-flex justify-content-around">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="mtn" name="paymentMethod" value="MTN" class="custom-control-input">
                                                <label class="custom-control-label" for="mtn">
                                                    <img src="/img/MTN.jfif" alt="MTN Mobile Money" width="50">
                                                </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="moov" name="paymentMethod" value="Moov" class="custom-control-input" >
                                                <label class="custom-control-label" for="moov">
                                                    <img src="/img/MOOV.png" alt="Moov Money" width="50">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Payer Maintenant</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Bouton pour ouvrir le modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
                    Payer Cotisation
                </button>





                <h5 class="mt-4">Historique des Paiements :</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Numéro transaction</th>
                                    <th>Montant</th>
                                    <th>Mois de Paiement</th>
                                    <th>telephone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paiements as $paiement)
                                    <tr>
                                        <td>{{ $paiement->user->nom }}</td>
                                        <td>{{ $paiement->num_transaction }}</td>
                                        <td>{{ $paiement->montant }}</td>
                                        <td>{{ $paiement->mois }}</td>
                                        <td>{{ $paiement->telephone }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

            <section id="features" class="features my-3">
              <h2 style="text-align: center; padding: 20px; font-weight: bold;">Les adhérents par département</h2>
              <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                  <!-- Boucle sur les départements -->
                  @foreach($departements as $departement)
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{ $departement->libelle }}</h5>
                        <p class="card-text">
                          <span class="font-bold">{{ $departement->nombre_adherents }}</span> Adhérent{{$departement->nombre_adherents > 1 ? 's' : ''}}
                        </p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <!-- Fin de la boucle -->
                </div>
              </div>
            </section>
          </div>

        </div>
      </div>
      <!-- /page content -->



      <!-- footer content -->
      <footer class="container-fluid">
        <div class="row">
          <div class="col-12 text-center">
            &copy; 2024 Mouvement des Peuples Africains
          </div>
        </div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- Flot -->
  <script src="/vendors/Flot/jquery.flot.js"></script>
  <script src="/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/vendors/DateJS/build/date.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="/vendors/moment/min/moment.min.js"></script>
  <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="/build/js/custom.min.js"></script>
</body>

</html>
