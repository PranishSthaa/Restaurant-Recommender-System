<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant') }}
        </h2>
    </x-slot>

    <div class="py-12 mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div id="alert" class="bg-green-200 border-green-600 text-green-600 border-l-4 p-4 m-2" role="alert">
                <p class="font-bold">
                    Success
                </p>
                <p>
                    {{ session()->get('message') }}
                </p>
                <div class="text-right">
                    <button class="text-gray-500 hover:text-gray-800" aria-label="Close"
                        onclick="this.parentElement.parentElement.remove();">Close</button>
                </div>
            </div>
        @endif
        <div class="flex justify-end px-4">
            <button
                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 bg-opacity-100 hover:bg-indigo-700"
                data-hs-overlay="#hs-vertically-centered-modal">
                Add Restaurant
            </button>

        </div>

        <div class="p-4 text-gray-900">
            <table class="w-full table-auto divide-y divide-gray-200 mt-2 rounded-md">
                <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Address</th>
                        <th class="px-6 py-3 text-left">Contact</th>
                        <th class="px-6 py-3 text-left">Rating</th>
                        <th class="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200 bg-white">
                    @foreach ($restaurants as $restaurant)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $restaurant->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $restaurant->address }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $restaurant->contact }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $restaurant->totalRating }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('backend.restaurant.show', $restaurant->id) }}"
                                    class="text-blue-600 hover:text-blue-900">View</a>
                                <a onclick="return confirm('Delete restaurant?')"
                                    href="{{ route('backend.restaurant.destroy', $restaurant->id) }}"
                                    class="text-red-600 hover:text-red-900 ml-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    <div class="mt-2">
                        {{ $restaurants->links() }}
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    <div id="hs-vertically-centered-modal"
        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
            <div class="flex flex-col bg-white border rounded-xl">
                <div class="flex justify-between items-center py-3 px-4 border-b ">
                    <h3 class="font-bold text-gray-800 text-lg">
                        Add Restaurant
                    </h3>
                    <button type="button"
                        class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-gray-500 hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm"
                        data-hs-overlay="#hs-vertically-centered-modal">
                        <span class="sr-only">Close</span>
                        <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>
                <form action="{{ route('backend.cuisine.save') }}" method="post">
                    @csrf
                    <div class="p-4 overflow-y-auto">
                        {{-- <x-input-label for="name" :value="__('Restaurant Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-96" required
                            autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
                        {{-- <div>
                            <label for="name" class="block text-sm font-medium mb-2">Name</label>
                            <input type="text" id="name"
                                class="py-3 px-4 block w-96 border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter Restaurant Name">
                        </div>

                        <div class="mt-2">
                            <label for="name" class="block text-sm font-medium mb-2">Address</label>
                            <input type="text" id="name"
                                class="py-3 px-4 block w-96 border-gray-200 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Enter Restaurant Address">
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 bg-opacity-100 hover:bg-indigo-700">
                            Save
                        </button>
                    </div> --}}
                        <div
                            class="grid grid-cols-12 gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                            <div class="col-span-12">
                                <h2 class="text-base font-semibold text-gray-800">
                                    Basic Information
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <label for="name" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                    Name
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <input id="name" type="text" name="name"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <label for="address" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                    Address
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <input id="address" type="text" name="address"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 text-sm rounded-lg focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <div class="inline-block">
                                    <label for="contact" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                        Phone
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <input id="contact" type="text" name="contact"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <div class="inline-block">
                                    <label for="af-submit-application-bio"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                        Description
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <textarea id="af-submit-application-bio"
                                    class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    rows="5" placeholder="Write description of the restaurant..." required></textarea>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                {{-- <div class="inline-block">
                                    <label for="online_order"
                                        class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                        Online Order
                                    </label>
                                </div> --}}
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <label for="online_order"
                                    class="flex p-3 w-full bg-white border border-gray-200 rounded-md text-sm ">
                                    <input type="checkbox" name="online_order"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-indigo-600 pointer-events-none"
                                        id="online_order" required>
                                    <span class="inline-block text-sm font-medium text-gray-500 ml-3">Online
                                        Order?</span>
                                </label>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->

                        <!-- Section -->
                        <div
                            class="grid grid-cols-12 gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                            <div class="col-span-12">
                                <h2 class="text-base font-semibold text-gray-800">
                                    Attributes
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <label for="rest_type" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                    Restaurant Type
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <select id="rest_type" name="rest_type"
                                    class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option selected>Select Restaurant Type</option>
                                    @foreach ($rest_types as $rest_type)
                                        <option value="{{ $rest_type->id }}">{{ $rest_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <label for="cuisine" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
                                    Cuisine
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <select id="cuisine" name="cuisine"
                                    class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option selected>Select Cuisine</option>
                                    @foreach ($cuisines as $cuisine)
                                        <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <div class="inline-block">
                                    <label for="avg_cost_min" class="inline-block text-sm font-medium text-gray-500">
                                        Approximate Cost (Minimum)
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <input id="avg_cost_min" type="text" name="avg_cost_min"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-3">
                                <div class="inline-block">
                                    <label for="avg_cost_max" class="inline-block text-sm font-medium text-gray-500 ">
                                        Approximate Cost (Maximum)
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->

                            <div class="col-span-9">
                                <input id="avg_cost_max" type="text" name="avg_cost_max"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 rounded-lg text-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                            <!-- End Col -->

                        </div>
                        <!-- End Section -->

                        <button type="button"
                            class="py-3 px-4 w-full inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-indigo-500 text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all text-sm">
                            Save
                        </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
