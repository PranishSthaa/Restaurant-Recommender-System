@extends('frontend.layout')

@section('title', 'Restaurant Detail')

@section('content')
    Restaurant Detail of {{ $restaurant->name }}
@endsection
