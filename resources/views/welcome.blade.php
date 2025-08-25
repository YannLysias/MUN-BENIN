<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MUN Bénin </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="/asset/img/logo.jpg">

  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  .active {
    color:  #fd7e14;
    border-bottom: 3px solid #fd7e14;

  }
  </style>
</head>

<body>

  @include('layouts.header')

@if (session('success'))
    <script>
        window.onload = function() {
            alert('{{ session('success') }}');
        }
    </script>
@endif
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Mouvement d'Unité <br>Nationale (MUN)</h1>
      <h2>Bienvenue chez vous, bienvenue chez nous !</h2>
      <a href="{{ route('verifier.code.form') }}" style="background-color: #fd7e14; border: none;" class="btn-get-started">Adhérer</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="{{ ('asset/img/EMBLEME.png') }}" class="img-fluid" alt="image" style=" width : 650px; height: 650px">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h2 style=" font-weight: bold;">Présentation</h3>
            <p class="fst-italic">
                 Le Bénin est un pays riche de son histoire, de sa jeunesse et de ses ressources humaines. Pourtant, la majorité de ses jeunes vivent dans la précarité, le chômage, l’exclusion sociale et le désespoir. Face à ces défis, le Mouvement d’Unité Nationale (MUN) est né pour rassembler la jeunesse autour d’un projet patriotique, pacifique et transformateur.
                  Le MUN se veut un espace de réveil citoyen, un creuset de réflexion et d’action pour rebâtir la nation sur des bases solides : la paix, la dignité et la justice sociale. Nous croyons que le redressement national est possible, si et seulement si les jeunes prennent leur destin en main.
            </p>
            <ul>
                <li><b>Nos valeurs fondamentales sont</b></li>

                    <ol>1.  Paix et Unité nationale ;</ol>
                    <ol>2.  Justice et équité sociale ;</ol>
                    <ol>3.  Travail, discipline et mérite ;</ol>
                    <ol>4.  Inclusion et solidarité ;</ol>
                    <ol>5.  Engagement patriotique ;</ol>
                    <ol>6.  Bonne gouvernance</ol>

            </ul>
            <p>Bienvenue chez vous, bienvenue chez nous.</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">
        <div class="row counters justify-content-center">
          <div class="col-lg-3 col-6 text-center mx-auto">
            <span data-purecounter-start="0" style="color: #fd7e14;" data-purecounter-end="{{$totalAdherants}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Adhérent{{$totalAdherants > 1 ? 's' : ''}}</p>
          </div>

          <div class="col-lg-3 col-6 text-center mx-auto">
            <span data-purecounter-start="0" style="color: #fd7e14;" data-purecounter-end="{{$totalCoordonnateur}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Coordonnateur{{$totalCoordonnateur > 1 ? 's' : ''}}</p>
          </div>

          <div class="col-lg-3 col-6 text-center mx-auto">
            <span data-purecounter-start="0" style="color: #fd7e14;" data-purecounter-end="{{$totalDiaspora}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Diaspora{{$totalDiaspora > 1 ? 's' : ''}}</p>
          </div>

          <div class="col-lg-3 col-6 text-center mx-auto">
            <span data-purecounter-start="0" style="color: #fd7e14;" data-purecounter-end="{{$totalUser}}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total d'enregistrement</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features mt-5">
      <h2 style="text-align: center; padding: 20px; font-weight: bold;">Les adhérents par département</h2>
      <div class="container" data-aos="fade-up">
          <div class="row" data-aos="zoom-in" data-aos-delay="100">
              @foreach($departements as $departement)
              <div class="col-md-3">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">{{ $departement->libelle }}</h5>
                          <p class="card-text"> <span class="font-bold">{{ $departement->nombre_adherents }}</span> Adhérent{{$departement->nombre_adherents > 1 ? 's' : ''}}</p>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>

  <style>
    .card {
        margin-bottom: 20px;
        border: 1px solid #fd7e14;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease; /* Ajout d'une transition fluide pour l'effet de survol */
    }

    .font-bold {
        font-weight: 800;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
    }

    .card-text {
        font-size: 16px;
    }
</style>


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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: #fd7e14; color: #fff;"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
