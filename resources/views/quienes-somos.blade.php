@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('quienes-somos') }}
@endsection

@section('content')
    <app-quienes-somos></app-quienes-somos>  
@endsection