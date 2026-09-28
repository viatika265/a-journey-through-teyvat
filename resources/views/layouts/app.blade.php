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
            <a href="/#teyvat" class="nav-link" data-section="teyvat">Home</a>
            <a href="/#region-map" class="nav-link" data-section="region-map">Teyvat Map</a>
            <a href="/#explore" class="nav-link" data-section="explore">Explore Teyvat</a>
            <a href="/#trailer" class="nav-link" data-section="trailer">Trailer</a>
            <a href="/#update" class="nav-link" data-section="update">Update</a>
            <a href="/#download" class="nav-link" data-section="download">Download</a>
        </div>
    </nav>

    @yield('content')
</body>
</html>

<style>
    .nav-link {
        color: var(--color-neutral-light);
        transition: color 0.3s ease;
    }

    .nav-link.active {
        color: var(--color-yellow-normal);
         text-shadow: 0 2px 8px var(--color-yellow-darker);
    }
</style>

<script>
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    navLinks.forEach((link) => {
                        link.classList.remove('active');
                    });
    
                    const activeLink = document.querySelector(
                        `.nav-link[data-section="${entry.target.id}"]`
                    );
    
                    if (activeLink) {
                        activeLink.classList.add('active');
                    }
                }
            });
        },
        {
            threshold: 0.5
        }
    );
    
    sections.forEach((section) => observer.observe(section));

</script>