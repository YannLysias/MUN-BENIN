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
    <section>
        <div class="container mt-5">
            <div class="container">
                <h3>🔑 Vérification du Code département</h3>
                @if(session('error'))
                    <p class="text-danger">{{ session('error') }}</p>
                @endif

                <form method="POST" action="{{ route('verifier.code') }}">
                    @csrf
                    <div class="form-group">
                        <label for="code">Entrez votre code département</label>
                        <input type="text" name="code" class="form-control" placeholder="Ex: MUN-111-AAA" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Valider</button>
                </form>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

  
  <!-- Vendor JS Files -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>
</html>
