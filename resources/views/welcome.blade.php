@php
    $movies = \App\Models\Movie::where('is_active', true)->latest()->take(4)->get();
    $series = \App\Models\Series::where('is_active', true)->latest()->take(3)->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy - Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .movie-card:hover { transform: translateY(-4px) scale(1.03); box-shadow: 0 8px 32px rgba(0,0,0,0.4); }
        .filter-btn.active, .filter-btn:focus { background: #fbbf24; color: #111; }
    </style>
</head>
<body class="bg-black text-white min-h-screen">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="py-8 text-center">
            <h1 class="text-4xl font-bold tracking-widest mb-2"><span class="text-yellow-400">F</span>ilmy</h1>
            <p class="text-gray-400 text-lg mb-6">Your gateway to the world of movies & series</p>
            <a href="{{ route('login') }}" class="inline-block px-8 py-3 rounded-full bg-yellow-400 text-black font-bold text-lg shadow-lg hover:bg-yellow-300 transition mb-2">Enter Filmy</a>
        </header>

        <!-- Movies Section -->
        <section class="max-w-6xl mx-auto w-full px-4 mt-8">
            <h2 class="text-2xl font-bold mb-6">Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-6">
                @foreach($movies as $movie)
                    <div class="movie-card bg-gray-900 rounded-xl overflow-hidden shadow-lg flex flex-col items-center transition-transform duration-200">
                        <img src="{{ $movie->poster ?? asset('images/no-poster.jpg') }}" alt="{{ $movie->title }}" class="w-full h-48 object-cover">
                        <div class="p-3 text-center font-semibold">{{ $movie->title }}</div>
                        <div class="px-3 pb-3 text-center text-gray-400 text-sm">{{ Str::limit($movie->description, 60) }}</div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center">
                <a href="{{ route('movies.index') }}" class="inline-block px-6 py-2 rounded-full bg-yellow-400 text-black font-bold shadow hover:bg-yellow-300 transition">Show More</a>
            </div>
        </section>

        <!-- Series Section -->
        <section class="max-w-6xl mx-auto w-full px-4 mt-2 mb-12">
            <h3 class="text-2xl font-bold mb-6">Series</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
                @foreach($series as $item)
                    <div class="bg-gray-800 rounded-xl overflow-hidden shadow flex flex-col items-center">
                        <img src="{{ $item->poster ?? asset('images/no-poster.jpg') }}" alt="{{ $item->title }}" class="w-full h-32 object-cover">
                        <div class="p-2 text-center font-semibold">{{ $item->title }}</div>
                        <div class="px-2 pb-2 text-center text-gray-400 text-sm">{{ Str::limit($item->description, 60) }}</div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center">
                <a href="{{ route('series.index') }}" class="inline-block px-6 py-2 rounded-full bg-yellow-400 text-black font-bold shadow hover:bg-yellow-300 transition">Show More</a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="mt-auto py-6 text-center text-gray-500 text-sm border-t border-gray-800">
            <div class="flex flex-col sm:flex-row justify-center items-center gap-2">
                <span>&copy; 2024 Filmy. All Rights Reserved.</span>
                <span class="hidden sm:inline">|</span>
                <a href="#" class="hover:text-yellow-400">Get The App</a>
                <span class="hidden sm:inline">|</span>
                <a href="#" class="hover:text-yellow-400">Contact</a>
            </div>
        </footer>
    </div>
</body>
</html>
