<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl text-center font-bold mb-6">Perbarui Testimonial!</h1>

        <form action="{{ route('comments.update', $comment) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Testimonial Anda!</label>
                <textarea id="content" name="content" rows="4"
                    class="mt-1 block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400"
                    placeholder="Write a testimonial..." required>{{ old('content', $comment->content) }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Perbarui
                </button>
                <a href="{{ route('posts.show', ['slug' => $comment->post->slug]) }}"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-gray-700 bg-gray-200 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-300">
                    Kembal
                </a>
            </div>
        </form>
    </div>
</body>

</html>
