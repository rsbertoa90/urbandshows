@extends('layouts.app')


    
@section('breadcrumb')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('contentA')
    <app-home-a></app-home-a>
@endsection

@section('contentB')
    <app-home-b></app-home-b>
@endsection