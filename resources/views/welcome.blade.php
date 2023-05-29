@extends('frontend.layout')

@section('title', 'Welcome')

@section('content')
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Best Restaurants.
                    <strong class="font-extrabold text-red-500 sm:block">
                        Recommended For You.
                    </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Eat wherever you want. Personalized just for you!
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <button type="button"
                        class="py-2 px-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm">
                        Get Started
                    </button>
                    <button type="button"
                        class="py-2 px-2 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </section>

@endsection
