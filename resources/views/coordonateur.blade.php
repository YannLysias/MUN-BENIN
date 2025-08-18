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
        @if (session('success'))
        <script>
            window.onload = function() {
                alert('{{ session('success') }}');
            }
        </script>
    @endif
        <!-- /top navigation -->

        <!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
              </div>
            </div>

            <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Liste des coordonnateurs</h2>
              <ul class="nav navbar-right panel_toolbox">
                </li>

                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                    </p>


                    <div class="d-flex justify-content-end">
                      @auth
                      <a href="{{ route('coordonateur.pdf') }}" class="btn btn-primary btn-print">
                          <i class="fa fa-print"></i> Imprimer
                      </a>
                      @endauth
                      <a href="coordonateur/create" class="ml-auto">
                        <button type="button" class="btn btn-success">Ajouter</button>
                      </a>
                    </div>
                    <div style="display: flex;">

                        <select id="departement_ID"
                          style="height: 60px;  margin-right: 10px;  border-radius: 8px; padding: 5px; width: 50% ;border: 2px solid #ccc;"
                          class="form-select" aria-label="Default select example">
                          <option value="" disabled selected>Choisissez un departement</option>
                          @foreach ($departements as $departement)
                          <option value="{{$departement->id}}">{{$departement->libelle}}</option>
                          @endforeach
                        </select>
                        <select id="circonscription_ID"
                          style="height: 60px;  margin-right: 10px;  border-radius: 8px; padding: 5px; width: 50% ;border: 2px solid #ccc;" class="
                          form-select" aria-label="Default select example">
                          <option value="" disabled selected>Choisissez une circonscription</option>
                          @foreach ($circonscriptions as $circonscription)
                          <option value="{{$circonscription->id}}">{{$circonscription->libelle}}</option>
                          @endforeach
                        </select>
   
                        <select id="commune_ID"
                          style="height: 60px;  margin-right: 10px;  border-radius: 8px; padding: 5px; width: 50% ;border: 2px solid #ccc;" class="
                          form-select" aria-label="Default select example">
                          <option value="" disabled selected>Choisissez une commune</option>
                          @foreach ($communes as $commune)
                          <option value="{{$commune->id}}">{{$commune->libelle}}</option>
                          @endforeach
                        </select>
  
                        <select id="arrondissement_ID" class="form-select"
                          style="height: 60px; margin-right: 10px; border-radius: 8px; padding: 5px; width: 50%; border: 2px solid #ccc;"
                          aria-label="Default select example">
                          <option value="" disabled selected>Choisissez un arrondissement</option>
                          @foreach ($arrondissements as $arrondissement)
                          <option value="{{$arrondissement->id}}">{{$arrondissement->libelle}}</option>
                          @endforeach
                        </select>
  
                        <select id="quartier_ID"
                          style="height: 60px;  margin-right: 10px;  border-radius: 8px; padding: 5px; width: 50% ;border: 2px solid #ccc;"
                          class="form-select" aria-label="Default select example">
                          <option value="" disabled selected>Choisissez un quartier</option>
                          @foreach ($quartiers as $quartier)
                          <option value="{{$quartier->id}}">{{$quartier->libelle}}</option>
                          @endforeach
  
                        </select>
                      </div><br>



                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                          <tr>
                              <th>N°</th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Sexe</th>
                              <th>Téléphone</th>
                              <th>Profession</th>
                              <th>Diplome</th>
                              <th>Type</th>
                              <th>Poste</th>
                              <th>Quartier</th>
                              <th>Manipulation</th>
                          </tr>
                      </thead>
                      <tbody id="listAdherant">
                          @foreach ($coordonateurs as $index => $coordonateur)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $coordonateur->nom }}</td>
                              <td>{{ $coordonateur->prenom }}</td>
                              <td>{{ $coordonateur->sexe }}</td>
                              <td>{{ $coordonateur->telephone }}</td>
                              <td>{{ $coordonateur->profession }}</td>
                              <td>{{ $coordonateur->diplome }}</td>
                              <td>{{ $coordonateur->type }}</td>
                              @if($coordonateur->titre)
                                <td>{{ $coordonateur->titre->libelle }}</td>
                              @endif
                              @if($coordonateur->quartier)
                                <td>{{ $coordonateur->quartier->libelle }}</td>
                              @endif
                              <td>
                                  <div class="btn-group">
                                      <form action="{{ route('adherant.destroy', $coordonateur->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                      </form>
                                      <a href="/adherant/{{ $coordonateur->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                      <a href="{{ route('adherant.show', ['adherant' => $coordonateur->id]) }}" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
                                  </div>
                              </td>
        
                          </tr>
                          @endforeach
                      </tbody>
                  </table>


                  </div>

                  <!-- /page content -->
                  <!-- footer content -->
                  <footer>
                    <div class="clearfix"></div>
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
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->

    <script src="/build/js/custom.min.js"></script>





    <script>
        var index = 0;
            $(document).ready(function() {
                $('#departement_ID').change(function() {
                  var departementId = $(this).val();
    
                    if (departementId) {
                      var urlSelect = "{{ route('get-circonstriptions', ':departementId') }}";
                      urlSelect = urlSelect.replace(':departementId', departementId);
                      loadOptions(urlSelect, $('#circonscription_ID'));
    
                        var url = "/adherants/filter/?departement_id=" + departementId;
                        loadAdherants(url, $('#listAdherant'), index);
                    }
                });
    
                $('#circonscription_ID').change(function() {
                    var circonscriptionId = $(this).val();
                    if (circonscriptionId) {
                      var urlSelect = "{{ route('get-communes', ':circonscriptionId') }}";
                      urlSelect = urlSelect.replace(':circonscriptionId', circonscriptionId);
                      loadOptions(urlSelect, $('#commune_ID'))
    
                        var url = "/adherants/filter/?circonscription_id=" + circonscriptionId;
                        loadAdherants(url, $('#listAdherant'), index);
                    }
                });
    
                $('#commune_ID').change(function() {
                    var communeId = $(this).val();
                    if (communeId) {
                      var urlSelect = "{{ route('get-arrondissements', ':communeId') }}";
                      urlSelect = urlSelect.replace(':communeId', communeId);
                      loadOptions(urlSelect, $('#arrondissement_ID'))
    
                        var url = "/adherants/filter/?commune_id=" + communeId;
                        loadAdherants(url, $('#listAdherant'), index);
                    }
                });
    
    
                $('#arrondissement_ID').change(function() {
                    var arrondissementId = $(this).val();
                    if (arrondissementId) {
                      var urlSelect = "{{ route('get-quartiers', ':arrondissementId') }}";
                      urlSelect = urlSelect.replace(':arrondissementId', arrondissementId);
                      loadOptions(urlSelect, $('#quartier_ID'))
    
                        var url = "/adherants/filter/?arrondissement_id=" + arrondissementId;
                        loadAdherants(url, $('#listAdherant'), index);
                    }
                });
    
                $('#quartier_ID').change(function() {
                    var quartierId = $(this).val();
                    if (quartierId) {
                      var urlSelect = "{{ route('get-quartiers', ':quartierId') }}";
                      urlSelect = urlSelect.replace(':quartierId', quartierId);
                      // loadOptions(urlSelect, $('#quartier_ID'))
    
                        var url = "/adherants/filter/?quartier_id=" + quartierId;
                        loadAdherants(url, $('#listAdherant'), index);
                    }
                });
    



            function loadAdherants(url, targetSelect, index) {
                $.ajax({
                    type: "GET"
                    , url: url
                    , success: function(options) {
                        targetSelect.empty();
                        console.log(options, "----------------")

                        $.each(options, function(key, adherant) {
                          targetSelect.append('<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + adherant.nom + '</td>' +
                            '<td>' + adherant.prenom + '</td>' +
                            '<td>' + adherant.sexe + '</td>' +
                            '<td>' + adherant.telephone + '</td>' +
                            '<td>' + adherant.profession + '</td>' +
                            '<td>' + adherant.statut + '</td>' +
                            '<td>' + adherant.type + '</td>' +
                            '<td>' + adherant.created_at + '</td>' +

                            '<td>' +
                            '<div class="btn-group">' +
                                '<form action="{{ route('adherant.destroy', ':adherantId') }}" method="POST" onsubmit="return confirm(\'Voulez-vous vraiment supprimer cet utilisateur ?\');">'.replace(':adherantId', adherant.id) +
                                    '@csrf' +
                                    '@method('DELETE')' +
                                    '<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>' +
                                '</form>' +
                                '<a href="/adherant/' + adherant.id + '/edit" class="btn btn-success"><i class="fa fa-edit"></i></a>' +
                                '<a href="{{ route('adherant.show', ['adherant' => ':adherantId']) }}" class="btn btn-info"><i class="fa fa-info-circle"></i></a>'.replace(':adherantId', adherant.id) +
                            '</div>' +
                        '</td>');
                            console.log('Index : ' + index);

                            // Incrémentation de l'index
                            index++;
                        });
                    }
                });
            }
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

</body>

</html>
