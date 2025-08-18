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

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
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
                            @if ($diaspora->photo)
                              <img src="/storage/photos/{{ $diaspora->photo }}" style="width: 80px; height: 80px;" alt="Profile" class="rounded-circle profile-picture">
                          @else
                              @if ($diaspora->sexe === 'Feminin')
                                  <!-- Afficher une image spécifique pour les utilisateurs de sexe féminin -->
                                  <img src="/img/fille.jpg" style="width: 80px; height: 80px;" alt="Femme Avatar" class="rounded-circle profile-picture">
                              @else
                                  <!-- Afficher une image par défaut ou un avatar -->
                                  <img src="/img/images.png" style="width: 80px; height: 80px;" alt="Homme Avatar" class="rounded-circle profile-picture">
                              @endif
                          @endif
                          <h2>{{ $diaspora->nom }} {{ $diaspora->prenom }}</h2>
                          <h3>{{ $diaspora->type }}</h3>
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
                                <div class="col-lg-3 col-md-4 label ">Nom</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->nom }}</div>
                              </div>
                              <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Prénom(s)</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->prenom }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->telephone }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Sexe</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->sexe }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->email }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Type</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->type }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Profession</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->profession }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Statut</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->statut }}</div>
                              </div>
                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Categorie</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->categorie }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Numeéro Whatsapp</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->whatsap }}</div>
                              </div>

                              <div class="row">
                                <div class="col-lg-3 col-md-4 label">Pays</div>
                                <div class="col-lg-9 col-md-8">{{ $diaspora->pays }}</div>
                              </div>
                              {{-- @if ( Auth::user()->type == "Administrateur" ) --}}

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                              <!-- Profile Edit Form -->
                              <form>
                                <div class="row mb-3">
                                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                  <div class="col-md-8 col-lg-9">
                                    <img src="assets/img/profile-img.jpg" alt="Profile">
                                    <div class="pt-2">
                                      <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                      <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                    </div>
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom et Prénom</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                                  </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="Job" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="job" type="text" class="form-control" id="Role" value="Directeur">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="Country" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="country" type="text" class="form-control" id="Pays" value="Bénin">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="address" type="text" class="form-control" id="Address" value="Cotonou,Bénin">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Télephone</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="phone" type="text" class="form-control" id="Télephone" value="(+229)91104825">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="eail" type="email" class="form-control" id="Email" value="ulrich@gmail.com">
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                              </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-settings">

                              <!-- Settings Form -->
                              <form>

                                <div class="row mb-3">
                                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                                  <div class="col-md-8 col-lg-9">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                      <label class="form-check-label" for="changesMade">
                                        Changes made to your account
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                      <label class="form-check-label" for="newProducts">
                                        Information on new products and services
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="proOffers">
                                      <label class="form-check-label" for="proOffers">
                                        Marketing and promo offers
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                      <label class="form-check-label" for="securityNotify">
                                        Security alerts
                                      </label>
                                    </div>
                                  </div>
                                </div>

                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                              </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                              <!-- Change Password Form -->
                              <form>

                                <div class="row mb-3">
                                  <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="password" type="password" class="form-control" id="currentPassword">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="newpassword" type="password" class="form-control" id="newPassword">
                                  </div>
                                </div>

                                <div class="row mb-3">
                                  <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                  <div class="col-md-8 col-lg-9">
                                    <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                  </div>
                                </div>

                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                              </form><!-- End Change Password Form -->

                            </div>

                          </div><!-- End Bordered Tabs -->

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
<script src="/vendors/validator/multifield.js"></script>
<script src="/vendors/validator/validator.js"></script>

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
<script src="/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/vendors/nprogress/nprogress.js"></script>
<!-- validator -->
<!-- <script src="../vendors/validator/validator.js"></script> -->

<!-- Custom Theme Scripts -->
<script src="/build/js/custom.min.js"></script>

</body>

</html>
