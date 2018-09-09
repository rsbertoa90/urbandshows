@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('franquicia') }}
@endsection

@section('contentA')
    <app-franquicia></app-franquicia>
@endsection