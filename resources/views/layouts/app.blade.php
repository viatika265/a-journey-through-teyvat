<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'A Journey Through Teyvat')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="fixed top-0 left-0 z-50 w-full">
        <div class="flex items-center justify-between px-10 py-5 font-body text-heading-5 text-neutral-light">
            <a href="#teyvat">Home</a>
            <a href="#region-map">Teyvat Map</a>
            <a href="#explore">Explore Teyvat</a>
            <a href="#trailer">Trailer</a>
            <a href="#update">Update</a>
            <a href="#download">Download</a>
        </div>
    </nav>

    @yield('content')
</body>
</html>