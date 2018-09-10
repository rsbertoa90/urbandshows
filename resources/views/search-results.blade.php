@extends('layouts.app')

@section('contentA')
<app-search-results :ids="{{$products}}" searchString="{{$search}}"></app-search-results>
@endsection