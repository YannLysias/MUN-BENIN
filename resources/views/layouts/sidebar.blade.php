
<div class="navbar nav_title" style="border: 0;">
    <a href="/dashboard" class="site_title d-flex align-items-center">
        <img src="/assets/img/mpa.jpeg" alt="Logo ADN" class="logo mr-2">
        <span>MPA</span>
    </a>
  </div> <br><br>

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">

      <ul class="nav side-menu">
        <li><a href="/dashboard"><i class="fa fa-home"></i> TABLEAU DE BORD</a>
        </li>


            @if ( Auth::user()->type == "Administrateur" )

              <li><a href="/adherant"><i class="fa fa-users"></i>ADHERENTS</a>
              <li><a href="/coordonateur"><i class="fa fa-user"></i>COORDONATEURS</a>

              <li><a href="/titre"><i class="fa fa-certificate"></i> POSTES</a></li>
              <li><a href="/diaspora"><i class="fa fa-globe"></i> DIASPORAS</a></li>
              <li><a href="/cotisation"><i class="fa fa-money"></i> COTISATIONS</a></li>
            </li>

            @endif

            @if ( Auth::user()->type == "Adhérent")

            @if (auth()->check())
                    <li><a href="{{ route('adherant.show', ['adherant' => auth()->user()->id]) }}"><i class="fa fa-user"></i> PROFIL</a></li>
              @endif

            </li>

            @endif

            @if ( Auth::user()->type == "Coordonnateur")

            <li><a href="/adherant"><i class="fa fa-user"></i> ADHERENTS</a>
            <li><a href="/titre"><i class="fa fa-table"></i> POSTES </a>
              {{--
            <li><a href="/commentaire"><i class="fa fa-table"></i> Commentaire </a> --}}

            <li><a href="/adherant"><i class="fa fa-user"></i> ADHERENTS</a></li>
            @if (auth()->check())
            <li><a href="{{ route('adherant.show', ['adherant' => auth()->user()->id]) }}"><i class="fa fa-user"></i> PROFIL</a></li>
            @endif
            </li>

            @endif

          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Paramettre">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Se déconnecter" href="#">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
  </div>
</div>


<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open">
          <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
            data-toggle="dropdown" aria-expanded="false">
            <div class="user-info">
              @if (Auth::user()->photo)
              <img src="/storage/photos/{{Auth::user()->photo}}" alt="">
                @else
                    @if (Auth::user()->sexe === 'Feminin')
                        <!-- Afficher une image spécifique pour les utilisateurs de sexe féminin -->
                        <img src="/img/fille.jpg" alt="Photo">
                    @else
                        <!-- Afficher une image par défaut ou un avatar -->
                        <img src="/img/images.png" alt="Photo">
                    @endif
                @endif
              <div class="user-details">
                <h6>{{ Auth::user()->prenom }}</h6>
                <div>{{ Auth::user()->type }}</div>
              </div>
            </div>
          </a>

          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"
              href="{{ route('users-profile.show', ['users_profile' => Auth::id()]) }}">Profile</a>
            <a class="dropdown-item">
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="logout-button">
                  <i class=" "></i>
                  <span>Se déconnecter</span>
                </button>
              </form>
            </a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
<style>
    .logout-button {
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;

      text-decoration: none;
      display: block;
      width: 100%;
      text-align: left;
    }

    .logout-button:hover {
      background-color: transparent;
    }


    .user-info {
      display: flex;
      align-items: center;
    }

    .user-details {
      margin-left: 10px;
      /* Ajustez la marge selon vos besoins */
    }

    .user-details h6 {
      margin: 0;
    }

    .user-details div {
      font-size: 14px;
      /* Ajustez la taille de la police selon vos besoins */
      color: #888;
      /* Couleur du texte */
    }
    .logo {
      width: 30px; /* Ajustez la taille selon vos besoins */
      height: 30px; /* Ajustez la taille selon vos besoins */
      border-radius: 50%; /* Pour rendre le logo en forme de cercle */
      object-fit: cover; /* Pour s'assurer que l'image du logo est toujours entièrement contenue dans le cercle */
  }
  </style>
