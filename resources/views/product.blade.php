@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('product',$product) }}
@endsection


@section('contentA')
    @php
        dd($meta)
    @endphp    
@endsection