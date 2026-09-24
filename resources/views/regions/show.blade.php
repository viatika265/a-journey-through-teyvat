
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $region->name }} | A Journey Through Teyvat</title>
</head>
<body>
    <h1>{{ $region->name }}</h1>

    <h2>Meet the Characters</h2>

    @forelse ($characters as $character)
        <div>
            <h3>{{ $character->name }}</h3>
        </div>
    @empty
        <p>Karakter belum tersedia.</p>
    @endforelse
</body>
</html>