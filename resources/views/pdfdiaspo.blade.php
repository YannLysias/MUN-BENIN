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

    <style>
        h2 {
            color: #0b5e1e;
            text-decoration: underline;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #0b5e1e;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #0b5e1e;
        }

    </style>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
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

                            <div class="row">
                                <div class="col-md-12 col-sm-12 ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2 class="bg-danger text-dark mb-5">Mouvement des Peuples Africains (MPA)</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <ul class="nav navbar-right panel_toolbox">

                                                  <h3>Liste de la Diaspora</h3>
                                                </ul>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box table-responsive">
                                                        <table id="datatable" class="styled-table"
                                                            style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>N°</th>
                                                                    <th>Nom</th>
                                                                    <th>Prénom</th>
                                                                    <th>sexe</th>
                                                                    <th>Téléphone</th>
                                                                    <th>Profession</th>
                                                                    <th>pays</th>
                                                                    <th>type</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="listAdherant">
                                                                @foreach ($adherants as $index => $adherant)
                                                                <tr @class(['active-row' => ($index + 1) % 2 == 0])>
                                                                    <td>{{ $index + 1 }}</td>
                                                                    <td>{{ $adherant->nom }}</td>
                                                                    <td>{{ $adherant->prenom }}</td>
                                                                    <td>{{ $adherant->sexe }}</td>
                                                                    <td>{{ $adherant->telephone }}</td>
                                                                    <td>{{ $adherant->profession }}</td>
                                                                    <td>{{ $adherant->pays }}</td>
                                                                    <td>{{ $adherant->categorie }}</td>

                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
</body>

</html>
