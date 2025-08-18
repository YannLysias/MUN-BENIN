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

            <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">

    <form class="" action="{{ route('diaspora.update', $diaspora->id)}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @if ($diaspora)
        @method('PUT')
        </p>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nom<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->nom}}" name="nom"  placeholder="Nom en majuscule" required="required" />
            </div>
            @error('nom')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Prénom(s)<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->prenom}}" class='optional' name="prenom" data-validate-length-range="5,15" type="text" />
            </div>
            @error('prenom')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Sexe<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select id="choix" value="{{$diaspora->sexe}}" name="sexe" class="form-control forms-control-lg">
                <option value="" disabled selected>Choisir</option>
                <option value="Masculin" @selected($diaspora->sexe == 'Masculin' ? true : false)>M</option>
                <option value="Feminin" @selected($diaspora->sexe == 'Feminin' ? true : false)>F</option>
            </select>
            </div>
            @error('sexe')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->email}}" name="email" class='email' type="email" />
            </div>
            @error('email')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Téléphone<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->telephone}}" type="tel" class='tel' name="telephone" required='required' data-validate-length-range="8,20" />
            </div>
            @error('telephone')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Profession<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->profession}}" class='optional' name="profession" data-validate-length-range="5,15" type="text" />
            </div>
            @error('profession')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Pays<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="{{$diaspora->pays}}" class='optional' name="pays" data-validate-length-range="5,15" type="text" />
            </div>
            @error('pays')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>

    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Soumettre</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
        </div>
    </div>
    </div>
    @endif
    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    &copy; 2024 Mouvement des Peuples Africains
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Javascript functions	-->
    <script>
        function hideshow() {
            var password = document.getElementById("password1");
            var slash = document.getElementById("slash");
            var eye = document.getElementById("eye");

            if (password.type === 'password') {
                password.type = "text";
                slash.style.display = "block";
                eye.style.display = "none";
            } else {
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
            var submit = true
                , validatorResult = validator.checkAll(this);
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

    <script>
        var routes = {
            getCommunes: "{{ route('get-communes', ':departementId') }}"
            , getArrondissements: "{{ route('get-arrondissements', ':communeId') }}"
            , getQuartiers: "{{ route('get-quartiers', ':arrondissementId') }}"
        };

    </script>

    <script>
        $(document).ready(function() {
            // Détection des changements de sélection pour le département
            $('#departement_id').change(function() {
                var departementId = $(this).val();
                if (departementId) {
                    var url = "{{ route('get-communes', ':departementId') }}";
                    url = url.replace(':departementId', departementId);
                    //  $('#commune_id').attr('data-url', url);
                    // Appeler la fonction pour charger les options pour la commune
                    loadOptions(url, $('#commune_id'));
                }
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
