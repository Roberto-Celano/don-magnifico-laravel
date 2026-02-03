@extends('errors.layout')

@section('title', 'Pagina non trovata')
@section('code', '404')
@section('message', 'Pagina non trovata')
@section('description', 'La pagina che cerchi non esiste o è stata spostata. Puoi tornare alla home o visitare il menu.')
@section('secondary_url', url('/menu'))
@section('secondary_label', 'Vai al menu')
