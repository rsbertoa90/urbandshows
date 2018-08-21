@extends('layouts.app')



@section('breadcrumb')
    {{ Breadcrumbs::render('category',$category) }}
@endsection

@section('contentA')
    @php
        dd($meta)
    @endphp    
@endsection