@extends('layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('sucursales') }}
@endsection

@section('contentA')
    <app-sucursales></app-sucursales>
@endsection