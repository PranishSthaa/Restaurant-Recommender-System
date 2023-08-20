{{-- Review Form --}}
@auth
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <h2 class="text-xl font-bold sm:text-2xl">Write a Review</h2>

            <form class="mt-8" wire:submit.prevent="submitReview">
                <div class="mb-4">
                    <label for="title" class="block font-medium text-gray-700">Title</label>
                    <input id="title" type="text" placeholder="Enter title" wire:model="title"
                        class="mt-1 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-red-500 focus:ring-red-500">
                </div>

                <div class="mb-4">
                    <label for="rating" class="block font-medium text-gray-700">Rating</label>
                    <select id="rating" class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"
                        wire:model="rating">
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="review" class="block font-medium text-gray-700">Review</label>
                    <textarea id="review" rows="4" placeholder="Write your review" wire:model="review"
                        class="mt-1 px-4 py-2 border border-gray-300 rounded-md w-full"></textarea>
                </div>

                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white font-medium rounded-md hover:bg-red-600">Submit
                    Review</button>
            </form>
        </div>
    </section>
@endauth
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
