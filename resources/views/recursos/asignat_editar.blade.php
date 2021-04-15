@extends('plantilla')
@section('titulo', 'Recurs Incidencia')
@section('color_fons', "recurs")
@section('color-atras', 'recurs')
@section('boto_atras', './consultar')
@section('container')

<incidencies-asignades :user_id="{{Auth::user()->id}}"></incidencies-asignades>
@endsection
