@extends('frontend.layout')

@section('title', 'Welcome')

@section('content')
    {{-- <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 min-h-[75rem]">
            <!-- Page Heading -->
            <header class="max-w-3xl">
                <p class="mb-2 text-sm font-semibold text-blue-600">Starter Pages & Examples</p>
                <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl">Application Layout: Header
                    using Tailwind CSS</h1>
                <p class="mt-2 text-lg text-gray-800">This is a simple application layout with header
                    only example using Tailwind CSS.</p>
                <div class="mt-5 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
                    <a class="w-full sm:w-auto inline-flex justify-center items-center gap-x-3 text-center bg-blue-600 hover:bg-blue-700 border border-transparent text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4"
                        href="https://github.com/htmlstreamofficial/preline/tree/main/examples/html" target="_blank">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                        Get the source code
                    </a>
                    <a class="w-full sm:w-auto inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-blue-500 hover:text-blue-700 focus:outline-none focus:ring-2 ring-offset-white focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm py-3 px-4"
                        href="../examples.html">
                        <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path
                                d="M11.2792 1.64001L5.63273 7.28646C5.43747 7.48172 5.43747 7.79831 5.63273 7.99357L11.2792 13.64"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        Back to examples
                    </a>
                </div>
            </header>
            <!-- End Page Heading -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== --> --}}
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
