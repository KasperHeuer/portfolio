<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Home' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-black font-serif text-white w-full">
    <x-header />

    <main class="w-full">
        {{ $slot }}
    </main>
</body>
</html>
