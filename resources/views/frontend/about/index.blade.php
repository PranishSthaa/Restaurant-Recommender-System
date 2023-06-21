@extends('frontend.layout')

@section('title', 'About')

@section('content')
    {{-- <div class="max-w-2xl mx-auto text-center my-4">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">About</h2>
    </div> --}}
    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32">
            <div>
                <img class="rounded-xl"
                    src="https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80"
                    alt="Image Description">
            </div>
            <!-- End Col -->

            <div class="mt-5 sm:mt-10 lg:mt-0">
                <div class="space-y-6 sm:space-y-8">
                    <!-- Title -->
                    <div class="space-y-2 md:space-y-4">
                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 ">
                            Personalized Restaurant Recommendations Made Easy
                        </h2>
                        <p class="text-gray-500">
                            Welcome to the Restaurant Recommendation System! We provide intelligent restaurant
                            recommendations based on your preferences. Say goodbye to decision-making dilemmas and enjoy
                            personalized suggestions that match your food preferences, dietary restrictions, and more. Our
                            user-friendly interface and advanced algorithms make it easy to explore and manage restaurant
                            options. Join our community and experience dining made delightful.
                        </p>
                    </div>
                    <!-- End Title -->
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Features -->
@endsection
