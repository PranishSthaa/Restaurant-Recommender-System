<section class="bg-gray-50">
    <div class="h-1/5 border-b">
        <div class="container mx-auto py-4">
            <div class="flex justify-center">
                <div class="flex flex-wrap -mx-4">
                    @foreach ($cuisines as $cuisine)
                        <div class="px-4">
                            <button type="button" wire:click="filterByCuisine({{ $cuisine->id }})"
                                class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm">
                                {{ $cuisine->name }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        @if (empty($restaurants))
            <div class="text-center">
                <p class="text-xl font-bold sm-text-2xl md:text-3xl">☝️ Click <span class="text-red-500">cuisines</span>
                    above to view restaurants.</p>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($restaurants as $restaurant)
                    <div class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl">
                        <div class="h-52 flex-shrink-0">
                            <img src="{{ asset('images/hero-bg.jpg') }}" class="rounded-t-xl w-full h-full object-cover"
                                alt="">
                        </div>
                        <div class="flex-grow p-4 md:p-6 flex flex-col justify-between">
                            <div>
                                <span class="block mb-1 text-xs font-semibold uppercase text-red-600">
                                    {{ $restaurant->restaurant_type->name }}
                                </span>
                                <h3 class="text-xl font-semibold text-gray-800">
                                    {{ $restaurant->name }}
                                </h3>
                                <p class="mt-3 text-gray-500 flex-grow font-bold">
                                    Rs. {{ $restaurant->avg_cost_min }} - {{ $restaurant->avg_cost_max }}
                                </p>
                                <p class="mt-2 text-gray-500 flex-grow">
                                    {{ Str::limit($restaurant->description, 100) }}
                                </p>
                            </div>
                            <div class="flex justify-end">
                                <button type="button"
                                    class="py-3 px-4 justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 transition-all text-sm">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $restaurants->links() }}
            </div>

        @endif
    </div>
    <!-- End Card Blog -->
</section>
