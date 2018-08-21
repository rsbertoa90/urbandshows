@extends('layouts.app')



@section('breadcrumb')
    {{ Breadcrumbs::render('regalos-empresariales') }}
@endsection

@section('contentA')
    @php
        dd($meta)
    @endphp    
@endsection