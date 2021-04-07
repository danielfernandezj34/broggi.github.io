@extends('plantilla')
@section('titulo', 'Administrador gestionar Alertants')
@section('color_fons', "administrador")
@section('color-atras', 'administrador')
@section('boto_atras', './principal_administrador')
@section('incidencies')
    <a class="dropdown-item" href="./incidencies">Consultar incidencies</a>
@endsection
@section('container')
    <div class="card mt-3">
        <div class="card-body mt-1">
        <h5 class="card-title" id="titol_usuaris">Taula d'Incidencies</h5>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Número de la incidència" aria-label="Buscar ID incidència">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="boto_buscar"><i class="fal fa-search"> Buscar</i></button>
        </form>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Cognoms</th>
                    <th scope="col">Telèfon</th>
                    <th scope="col">Tipus d'alertant</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
