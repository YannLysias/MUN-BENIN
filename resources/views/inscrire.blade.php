<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="icon" href="/assets/img/mpa.jpeg">

  <title>MPA Bénin </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
    @include('layouts.header')

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" style="background-color: #fd7e14;">
      <div class="container">
        <h1>Formulaire d'adhésion</h1>
      </div>
    </div><!-- End Breadcrumbs -->
    <section>
          <div class="container mt-5">
          <form class="" action="/inscrire" method="post" enctype="multipart/form-data" >
          @csrf
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Nom <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" name="nom"  placeholder="Nom en majuscule" required="required" value="{{ old('nom') }}"/>
                  @error('nom')
                      <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Prénoms <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' placeholder="La première lettre en majuscule" required="required" name="prenom" data-validate-length-range="5,15" type="text" value="{{ old('prenom') }}"/>
                  @error('prenom')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Email <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" name="email" class='email' placeholder="Indiquez votre Email" required="required" type="email"  value="{{ old('email') }}"/>
                  @error('email')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Téléphone <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" type="tel" class='tel' placeholder="Indiquez votre Numéro de téléphone" name="telephone" required='required' data-validate-length-range="8,20"  value="{{ old('telephone') }}"/>
                  @error('telephone')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Sexe <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="choix" class="form-control" name="sexe" required="required">
                    <option value="" disabled selected>Choisir</option>
                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                  </select>
                  @error('sexe')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-3">
                  <label for="prenom" class="form-label"><b>Groupe sanguin <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' placeholder="Indiquez votre groupe sanguin" name="gsanguin" data-validate-length-range="5,15" type="text" value="{{ old('gsanguin') }}"/>
                @error('gsanguin')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Date Naissance <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' placeholder="date_naissance" name="date_naissance" data-validate-length-range="5,15" type="date" value="{{ old('prenom') }}"/>
                  @error('date_naissance')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Lieu de Naissance <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' placeholder="Indiquez votre lieu de naissance" name="lieu_naissance" data-validate-length-range="5,15" type="text" value="{{ old('lieu_naissance') }}"/>
                  @error('lieu_naissance')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Profession <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' name="profession" placeholder="Indiquez votre profession" data-validate-length-range="5,15" type="text" value="{{ old('profession') }}" />
                  @error('profession')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Niveau d'inscription <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' placeholder="Indiquez le dernier diplôme  que vous avez obtenu" name="diplome" data-validate-length-range="5,15" type="text" value="{{ old('diplome') }}"/>
                  @error('diplome')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Occupation</b></label>
                  <input class="form-control" class='Occupation' name="occupation" placeholder="Indiquez quelle activité vous pratiquez en ce moment"required data-validate-length-range="5,15" type="text" value="{{ old('occupation') }}" />
                  @error('profession')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Numéro whatsapp</b></label>
                  <input class="form-control" class='optional' placeholder="Pas obligatoire" name="whatsap" type="text" value="{{ old('whatsap') }}"/>
                  @error('diplome')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>NPI</b></label>
                  <input class="form-control" type="number" class='tel' name="npi" data-validate-length-range="8,20" placeholder="Pas obligatoire"  value="{{ old('npi') }}" />
                  @error('npi')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Departement <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="departement_id" value="{{ old('departement_id') }}" name="departement_id" class="form-control" required>
                    <option value=""  disabled selected>Indiquez votre département de résidence
                    </option>
                    @foreach ($departements as $departement)
                    <option value="{{$departement->id}}">{{$departement->libelle}}
                    </option>
                    @endforeach
                    @error('departement_id')
                    <div class="d-block text-danger">{{$message}}</div>
                    @enderror
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Circonscription <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="circonscription_id" value="{{ old('circonscription_id') }}" name="circonscription_id" class="form-control" required>
                    <option value="" disabled selected>Choisissez une Circonscription
                    </option>
                    {{-- @foreach ($communes as $commune)
                    <option value="{{$commune ->id}}">{{$commune->libelle}}</option>
                    @endforeach
                    @error('commune_id')
                    <div class="d-block text-danger">{{$message}}</div>
                    @enderror --}}
                </select>
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Commune <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="commune_id" value="{{ old('commune_id') }}" name="commune_id" class="form-control" required>
                    <option value="" disabled selected>Choisissez une commune
                    </option>
                    {{-- @foreach ($communes as $commune)
                    <option value="{{$commune ->id}}">{{$commune->libelle}}</option>
                    @endforeach
                    @error('commune_id')
                    <div class="d-block text-danger">{{$message}}</div>
                    @enderror --}}
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Arrondissement <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="arrondissement_id" value="{{ old('arrondissement_id') }}" name="arrondissement_id" class="form-control" required>
                    <option value="" disabled selected>Choisissez un Arrondissement
                    </option>
                    {{-- @foreach ($arrondissements as $arrondissement)
                    <option value="{{$arrondissement ->id}}">
                        {{$arrondissement->libelle}}</option>
                    @endforeach
                    @error('arrondissement_id')
                    <div class="d-block text-danger">{{$message}}</div>
                    @enderror --}}
                </select>
                </div>
                <div class="col-md-6 form-group mt-3 ">
                  <label for="prenom" class="form-label"><b>Quartier <strong style="color: #f30606ff;">*</strong></b></label>
                  <select id="quartier_id" value="{{ old('quartier_id') }}" name="quartier_id" class="form-control" required>
                    <option value="" disabled selected>Choisissez un Quartier
                    </option>
                    {{-- @foreach ($quartiers as $quartier)
                    <option value="{{$quartier ->id}}">{{$quartier->libelle}}
                    </option>
                    @endforeach
                    @error('quartier_id')
                    <div class="d-block text-danger">{{$message}}</div>
                    @enderror --}}
                </select>
                </div>
              </div>

                <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
                <button type="reset" class="btn btn-primary mt-3">Annuler</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-jZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </form>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

        <div class="text-center">
            <div class="copyright">
            &copy; 2024 Mouvement des Peuples Africains  <strong></strong>
            </div>
        </div>
    </div>
  </footer><!-- End Footer -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
        $(document).ready(function() {
            // Détection des changements de sélection pour le département
            $('#departement_id').change(function() {
                var departementId = $(this).val();
                if (departementId) {
                    var url = "{{ route('get-circonstriptions', ':departementId') }}";
                    url = url.replace(':departementId', departementId);
                    //  $('#commune_id').attr('data-url', url);
                    // Appeler la fonction pour charger les options pour la commune
                    loadOptions(url, $('#circonscription_id'));
                }
            });

            // Détection des changements de sélection pour la circonscription
            $('#circonscription_id').change(function() {
                var circonscriptionId = $(this).val();

                var url = "{{ route('get-communes', ':circonscriptionId') }}";
                url = url.replace(':circonscriptionId', circonscriptionId);
                $('#circonscription_id').attr('data-url', url)
                var communeSelect = $('#commune_id');
                loadOptions(url + '/', communeSelect);
            });

            // Détection des changements de sélection pour la commune
            $('#commune_id').change(function() {
                var communeId = $(this).val();

                var url = "{{ route('get-arrondissements', ':communeId') }}";
                url = url.replace(':communeId', communeId);
                $('#commune_id').attr('data-url', url)
                var arrondissementSelect = $('#arrondissement_id');
                loadOptions(url + '/', arrondissementSelect);
            });

            // Détection des changements de sélection pour l'arrondissement
            $('#arrondissement_id').change(function() {
                var arrondissementId = $(this).val();

                var url = "{{ route('get-quartiers', ':arrondissementId') }}";
                url = url.replace(':arrondissementId', arrondissementId);
                $('#arrondissement_id').attr('data-url', url)
                var quartierSelect = $('#quartier_id');
                loadOptions(url + '/', quartierSelect);

            });

            // Fonction pour charger les options en fonction de l'URL spécifiée
            function loadOptions(url, targetSelect) {
                $.ajax({
                    type: "GET"
                    , url: url
                    , success: function(options) {
                        targetSelect.empty();
                        targetSelect.append('<option value="selected ' + '">' + 'Choisissez' + '</option>');
                        $.each(options, function(key, value) {
                            targetSelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        });
    </script>
  <!-- Vendor JS Files -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>
</html>
