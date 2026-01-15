<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Home' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    @font-face {
        font-family: 'RingbearerMedium';
        src: url('/fonts/RingbearerMedium-51mgZ.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    /* Optional: create a utility class for Tailwind usage */
    .font-ringbearer {
        font-family: 'RingbearerMedium', serif;
    }
</style>

<body class="bg-black font-serif text-white w-full">
    <x-header />
    <main class="w-full max-w-full mx-auto px-4 md:px-0">
        {{ $slot }}
    </main>
</body>

</html>
