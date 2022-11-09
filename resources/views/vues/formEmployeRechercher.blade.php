@extends('layouts.master')
@section('content')
    <div>
        <br><br>
        <br><br>
        <div class="container">
            <div class="blanc">
                <h1>Liste de mes Employes</h1>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Numéros</th>
                    <th>Civilité</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mot de passe</th>
                    <th>Intérêt</th>
                    <th>Profil</th>
                    <th>Message</th>
                    <th>Modifier</th>
                </tr>
                </thead>
                    <tr>
                        <td>{{ $monEmploye->nom }}</td>
                        <td>{{ $monEmploye->civilite }}</td>
                        <td>{{ $monEmploye->nom }}</td>
                        <td>{{ $monEmploye->prenom }}</td>
                        <td>{{ $monEmploye->pwd }}</td>
                        <td>{{ $monEmploye->interet }}</td>
                        <td>{{ $monEmploye->profil }}</td>
                        <td>{{ $monEmploye->message }}</td>
                        <td style="text-align: center">
                            <a href="{{url('/modifierEmploye')}}/{{($monEmploye->numEmp)}}">
                                <span class="glyphicon glyphicon-pencil"
                                      data-toggle="tooltip" data-placement="top" title="Modifier">
                                </span>
                            </a>
                        </td>
                    </tr>
                <br> <br>
            </table>

        </div>
    </div>
@stop
