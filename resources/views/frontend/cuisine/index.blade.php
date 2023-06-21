@extends('frontend.layout')

@section('title', 'Cuisine')

@section('content')
    <div class="max-w-2xl mx-auto text-center my-4">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Cuisine</h2>
    </div>
    <livewire:frontend.cuisine.restaurant-listing />
@endsection
