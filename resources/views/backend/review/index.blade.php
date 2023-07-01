<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Review') }}
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
            {{-- <button
                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 bg-opacity-100 hover:bg-indigo-700"
                data-hs-overlay="#hs-vertically-centered-modal">
                Add Cuisine
            </button> --}}

        </div>

        <div class="p-4 text-gray-900">
            <table class="w-full table-auto divide-y divide-gray-200 mt-2 rounded-md">
                <thead class="bg-gray-50 text-gray-500 uppercase tracking-wider text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">Review</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200 bg-white">
                    {{-- @foreach ($cuisines as $cuisine)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $cuisine->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $cuisine->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a onclick="return confirm('Delete Cuisine?')"
                                    href="{{ route('backend.cuisine.destroy', $cuisine->id) }}"
                                    class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
