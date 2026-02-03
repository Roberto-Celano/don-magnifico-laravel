@extends('errors.layout')

@section('title', 'Sessione scaduta')
@section('code', '419')
@section('message', 'Sessione scaduta')
@section('description', 'La sessione è scaduta. Ricarica la pagina o torna alla home.')
@section('secondary_url', url()->current())
@section('secondary_label', 'Ricarica')
