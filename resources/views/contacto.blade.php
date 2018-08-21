@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('contacto') }}
@endsection

@section('contentA')
    <app-contacto></app-contacto>  
@endsection