@extends('layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('cotizador') }}
@endsection

@section('contentA')
    <app-cotizer></app-cotizer>
@endsection