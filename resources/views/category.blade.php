@extends('layouts.app')



@section('breadcrumb')
    {{ Breadcrumbs::render('category',$category) }}
@endsection

@section('contentA')
    <app-category category_id="{{$category->id}}"></app-category>
@endsection