@extends('layouts.app')



@section('breadcrumb')
    {{ Breadcrumbs::render('regalos-empresariales') }}
@endsection

@section('contentA')
    
        <app-regalos></app-regalos>
     
@endsection