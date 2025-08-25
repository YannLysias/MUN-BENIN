<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto" style="width: 200px;"><img src="/asset/img/logo.jpg" alt="" class="img-fluid"><a href="#" style="color: #fd7e14;"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->


        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0" >
             <ul class="">
                <li class="nav-item me-lg-5">
                    <a class="nav-link {{ Route::currentRouteName() == 'welcome' ? ' active' : ''  }} px-0"
                        href="/">ACCUEIL</a>
                </li>
                {{-- <li><a href="#" style="color: #fd7e14;">A PROPOS</a></li> --}}
                <li class="nav-item me-lg-5">
                    <a class="nav-link {{ Route::currentRouteName() == 'contact' ? ' active' : ''  }} px-0"
                        href="/contact-us">CONTACTEZ-NOUS</a>
                </li>
                <li class="dropdown"><a href="#" class="nav-link {{ Route::currentRouteName() == '/inscrire/create' ? ' active' : '/diaspora/create'  }} px-0"><span>ADHERER</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li class="nav-item me-lg-5"><a href="{{ route('verifier.code.form') }}">Local (Benin)</a></li>
                      <li class="nav-item me-lg-5"><a href="{{ route('verifier.code.diaspo') }}">Extérieur du pays</a></li>
                    </ul>
                  </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="{{ route('login') }}" class="get-started-btn" style="background-color: #fd7e14; color: #fff;">SE
            CONNECTER</a>

    </div>
</header><!-- End Header -->