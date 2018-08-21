@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('franquicia') }}
@endsection

@section('contentA')
    @php
        dd($meta)
    @endphp    
@endsection