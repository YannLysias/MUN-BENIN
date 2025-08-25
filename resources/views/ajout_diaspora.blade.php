<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>MUN Bénin </title>
    
  <link rel="icon" href="/asset/img/logo.jpg">
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
        <h1>S'inscrire (Diaspora)</h1>
      </div>
    </div><!-- End Breadcrumbs -->
    <section>
          <div class="container mt-5">
          <form class="" action="/diaspora" method="post" enctype="multipart/form-data" novalidate >
          @csrf
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Nom <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" name="nom"  placeholder="Nom en majuscule" required="required" value="{{ old('nom') }}"/>
                  @error('nom')
                      <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3">
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
                <div class="col-md-6 form-group mt-3">
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
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Profession <strong style="color: #f30606ff;">*</strong></b></label>
                  <input class="form-control" class='optional' name="profession" placeholder="Indiquez votre profession" data-validate-length-range="5,15" type="text" value="{{ old('profession') }}" />
                  @error('profession')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <label for="prenom" class="form-label"><b>Pays actuel<strong style="color: #f30606ff;">*</strong></b></label>
                  <div class="col-md-6 col-sm-6">
                      <select class="form-control" id="pays" name="pays">
                          <option value="">Sélectionnez un pays</option>
                      </select>
                  </div>
                  @error('pays')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              
        </div>

        <div style="margin-left: auto; margin-left: 110px;">
            <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
            <button type="reset" class="btn btn-primary mt-3 ml-2">Annuler</button>
        </div>

            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-jZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </form>
    </section>

  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

    <div class="container flex py-4">

      <div class="text-center">
        <div class="copyright">
          &copy; 2025 Mouvement d'Unité Nationale <strong></strong>
        </div>
      </div>
    </div>
    </footer><!-- End Footer -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var username = 'yannlysias'; // Remplacez YOUR_GEONAMES_USERNAME par votre nom d'utilisateur Geonames
        var url = 'http://api.geonames.org/countryInfoJSON?username=' + username;

        // Envoi de la requête à l'API Geonames pour récupérer les pays
        fetch(url)
            .then(response => response.json())
            .then(data => {
                // Vérifier si l'API a retourné des données
                if (data.geonames && data.geonames.length > 0) {
                    var paysSelect = document.getElementById('pays');

                    // Ajouter les options de pays au menu déroulant
                    data.geonames.forEach(function(pays) {
                        var option = document.createElement('option');
                        option.value = pays.countryName;
                        option.textContent = pays.countryName;
                        paysSelect.appendChild(option);
                    });
                }
            })
            .catch(error => console.error('Erreur lors de la récupération des pays depuis Geonames :', error));
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