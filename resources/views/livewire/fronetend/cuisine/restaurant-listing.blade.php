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
    <div class="my-4">
        <ul>
            @foreach ($restaurants as $restaurant)
                <li>{{ $restaurant->name }}</li>
            @endforeach
        </ul>
    </div>
</section>
