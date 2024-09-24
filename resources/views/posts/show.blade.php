<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    @include ('layouts.navbar')
</head>

<body class="overflow-x-hidden"> <!-- Prevent horizontal scrolling -->
    <div class="container mx-auto p-4"> <!-- Adjust container to fit screen -->
        <!-- Title and Description -->
        <h1 class="text-3xl font-bold" data-aos="fade-right" data-aos-duration="1000">{{ $post->title }}</h1>
        <p class="mb-4" data-aos="fade-up" data-aos-duration="1000">{{ $post->description }}</p>

        <h2 class="text-2xl font-bold" data-aos="fade-left" data-aos-duration="1000">Photos</h2>
        @if ($post->photos->isNotEmpty())
            <div id="indicators-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative md:h-screen h-56 overflow-hidden rounded-lg md:h-96" data-aos="fade-down"
                    data-aos-duration="1000">
                    <div class="carousel-inner">
                        @foreach ($post->photos as $index => $photo)
                            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                                data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $photo->image_path) }}"
                                    class="absolute block w-full max-w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="{{ $photo->alt_text }}">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                        @foreach ($post->photos as $index => $photo)
                            <button type="button" class="w-3 h-3 rounded-full bg-gray-500"
                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"
                                data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-500 group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-gray-700 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-500 group-hover:bg-gray-600 group-focus:ring-4 group-focus:ring-gray-700 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        @else
            <p data-aos="fade-up" data-aos-duration="1000">Belum ada photo :(</p>
        @endif
        <div class="py-6"data-aos="fade-up" data-aos-duration="1000">
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 18 21">
                    <path
                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                </svg>
                <a href="mailto:teamtefa@rplnekat.com">Saya Tertarik!</a>
            </button>
        </div>

        <!-- Comments -->
        <h1 class="font-bold text-2xl" data-aos="fade-left" data-aos-duration="1000">Testimonial</h1>
        <div class="flex flex-wrap gap-4 py-8">
            @foreach ($post->comments as $comment)
                <article
                    class="bg-white rounded-lg shadow-md p-6 mb-6 border border-gray-300 w-full max-w-2xl sm:w-full md:w-full lg:w-full xl:w-full"
                    data-aos="zoom-out-up" data-aos-duration="1000">
                    <div class="flex justify-between mb-4">
                        <div class="font-medium dark:text-white">
                            <p>{{ $comment->user ? $comment->user->name : 'Deleted User' }}</p>
                        </div>
                        @if ($comment->user_id === Auth::id())
                            <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 4 15">
                                    <path
                                        d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDots"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconButton">
                                    <li>
                                        <a href="{{ route('comments.edit', $comment) }}"
                                            class="block px-4 py-2 hover:bg-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                                            onsubmit="return confirmDeletion(event);">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><button
                                                    type="submit">Delete</button></a>
                                        </form>
                                        <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
                                        <script>
                                            function confirmDeletion(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: 'Yakin nih?',
                                                    text: "Gabakal bisa bikin dia balik lagi loh!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Ya, hapus ajalah',
                                                    cancelButtonText: 'Jangan Deh :('
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        event.target.submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </li>
                            </div>
                        @endif
                    </div>
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ Str::limit($comment->content, 150) }}</p>
                    <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                        {{-- <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->format('F j, Y')</time> --}}
                        <datetime="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</datetime>
                        @if ($comment->created_at != $comment->updated_at)
                            <span class="text-gray-500">(diedit pada
                                {{ $comment->updated_at->diffForHumans() }})</span>
                        @endif
                    </footer>
                </article>
            @endforeach
        </div>

        {{-- <!-- Comment Form -->
        @auth
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 shadow-lg">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" name="content" rows="4"
                            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </button>
                    </div>
                </div>
            </form>
        @endauth --}}

        <!-- Comment Form -->
        @auth
            @php
                $userHasCommented = $post->comments->where('user_id', Auth::id())->isNotEmpty();
            @endphp

            @if (!$userHasCommented)
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div
                        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 shadow-lg">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" name="content" rows="4"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Write a comment..." required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Post comment
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 shadow-lg">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800 text-red-900">
                        <p class="text-red-500">Kamu sudah memberikan Testimonial!</p>
                    </div>
                </div>
            @endif
        @endauth
    </div>
</body>

<script src="{{ asset('js/aos.js') }}"></script>
<script>
    AOS.init();
</script>

</html>
