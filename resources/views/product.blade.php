@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('product',$product) }}
@endsection


@section('contentA')

    <app-product :product_id="{{$product->id}}"></app-product>

@endsection