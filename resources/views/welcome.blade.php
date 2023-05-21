@extends('frontend.layout')

@section('title', 'Welcome')

@section('content')
    <livewire:frontend.navbar />
    <div class="hero min-h-screen" style="background-image: url(/images/hero-bg.jpg); object-fit: contain;">
        <div class="backdrop-blur h-full w-full"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold text-white">Hello there</h1>
                <p class="mb-5 text-white">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
@endsection
