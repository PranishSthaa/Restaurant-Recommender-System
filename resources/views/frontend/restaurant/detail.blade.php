@extends('frontend.layout')

@section('title', 'Restaurant Detail')

@section('content')
    <section>
        <div class="relative mx-auto max-w-screen-xl px-4 py-8">
            <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
                    <img alt="Les Paul" src="{{ asset('images/hero-bg.jpg') }}"
                        class="aspect-square w-full rounded-xl object-cover" />
                </div>

                <div class="sticky top-0">
                    @if ($selectedRestaurant->online_order)
                        <strong
                            class="rounded-full border border-red-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-red-600">
                            Online Order
                        </strong>
                    @endif

                    <div class="mt-8 flex justify-between">
                        <div class="max-w-[35ch] space-y-2">
                            <h1 class="text-xl font-bold sm:text-2xl">
                                {{ $selectedRestaurant->name }}
                            </h1>

                            <p class="text-sm">📍 {{ $selectedRestaurant->address }}</p>

                            <p class="text-sm">📞 {{ $selectedRestaurant->contact }}</p>

                            <div class="-ms-0.5 flex">
                                @for ($i = 0; $i < $ratingOutOf5; $i++)
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>

                        <p class="text-lg font-bold">Rs. {{ $selectedRestaurant->avg_cost_min }} -
                            {{ $selectedRestaurant->avg_cost_max }}
                        </p>
                    </div>

                    <div class="mt-4">
                        <div class="prose max-w-none">
                            <p>
                                {{ $selectedRestaurant->description }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ $selectedRestaurant->cuisine->name }}</span>

                        <span
                            class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-500 text-white">{{ $selectedRestaurant->restaurant_type->name }}</span>
                    </div>
                    <div class="mt-2">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Review Form --}}
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold sm:text-2xl">Write a Review</h2>

            <form class="mt-8">
                <div class="mb-4">
                    <label for="title" class="block font-medium text-gray-700">Title</label>
                    <input id="title" type="text" placeholder="Enter title"
                        class="mt-1 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="rating" class="block font-medium text-gray-700">Rating</label>
                    <select id="rating" class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full">
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="review" class="block font-medium text-gray-700">Review</label>
                    <textarea id="review" rows="4" placeholder="Write your review"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"></textarea>
                </div>

                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600">Submit
                    Review</button>
            </form>
        </div>
    </section>
    {{-- All REVIEWS --}}
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold sm:text-2xl">Customer Reviews</h2>

            <div class="mt-4 flex items-center gap-4">
                <p class="text-3xl font-medium text-red-500">
                    {{ $ratingOutOf5 }}/5
                    <span class="sr-only"> Average review score </span>
                </p>
                <div>
                    <p class="mt-0.5 text-xs text-gray-500">Based on {{ $numberOfReviews }} reviews</p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-x-16 gap-y-12 lg:grid-cols-2">
                @foreach ($displayReviews as $displayReview)
                    <blockquote>
                        <header class="sm:flex sm:items-center sm:gap-4">
                            <div class="flex">
                                {{-- @for ($i = 0; $i < $displayReview->rating; $i++)
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor --}}
                                <p class="text-3xl font-medium">
                                    {{ $displayReview->rating }}/5
                                </p>
                            </div>

                            <p class="mt-2 font-medium sm:mt-0">{{ $displayReview->title }}</p>
                        </header>

                        <p class="mt-2 text-gray-700">
                            {{ $displayReview->comment }}
                        </p>

                        <footer class="mt-4">
                            <p class="text-xs text-gray-500">{{ $displayReview->user->name }} -
                                {{ $displayReview->created_at->format('Y-m-d') }}</p>
                        </footer>
                    </blockquote>
                @endforeach
                <div class="mt-2">
                    {{ $displayReviews->links() }}
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                    Similar Restaurants
                </h2>
            </header>

            <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($resultRestaurants as $resultRestaurant)
                    <li>
                        <div class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl">
                            <div class="h-52 flex-shrink-0">
                                <img src="{{ asset('images/hero-bg.jpg') }}"
                                    class="rounded-t-xl w-full h-full object-cover" alt="">
                            </div>
                            <div class="flex-grow p-4 md:p-6 flex flex-col justify-between">
                                <div>
                                    <span class="block mb-1 text-xs font-semibold uppercase text-red-600">
                                        {{ $resultRestaurant->cuisine->name }} /
                                        {{ $resultRestaurant->restaurant_type->name }}
                                    </span>
                                    <h3 class="text-xl font-semibold text-gray-800">
                                        {{ $resultRestaurant->name }}
                                    </h3>
                                    <p class="mt-3 text-gray-500 flex-grow font-bold">
                                        Rs. {{ $resultRestaurant->avg_cost_min }} - {{ $resultRestaurant->avg_cost_max }}
                                    </p>
                                    <p class="mt-2 text-gray-500 flex-grow">
                                        {{ Str::limit($resultRestaurant->description, 100) }}
                                    </p>
                                </div>
                                <div class="flex justify-end">
                                    <a href="{{ Route('frontend.restaurant.details', $resultRestaurant->id) }}">
                                        <button type="button"
                                            class="py-2 px-2 justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 transition-all text-sm">
                                            View Details
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
