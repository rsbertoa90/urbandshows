@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('set',$set) }}
@endsection


@section('content')

    <app-set :set_id="{{$set->id}}"></app-set>

@endsection