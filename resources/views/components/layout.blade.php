<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Photographer Portfolio' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto mt-8 p-6">
        <header class="text-center mb-8">
            <h1 class="text-4xl font-extrabold">Photographer Portfolio</h1>
            <nav class="mt-4">
                <ul class="flex justify-center space-x-4">
                    <li><a href="/" class="text-blue-500 hover:underline">Home</a></li>
                    <li><a href="/gallery" class="text-blue-500 hover:underline">Gallery</a></li>
                    <li><a href="/contact" class="text-blue-500 hover:underline">Contact</a></li>
                </ul>
            </nav>
        </header>
        {{ $slot }}
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
