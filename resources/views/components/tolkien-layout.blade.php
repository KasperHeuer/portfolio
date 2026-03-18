<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Tolkien' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('svg/favicon.svg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        ringbearer: ['RingbearerMedium', 'serif'],
                        fell: ['"IM Fell English"', 'serif'],
                    },
                    colors: {
                        parchment: '#f5e6c8',
                        ink: '#2c1a0e',
                        gold: '#c9a84c',
                        'gold-light': '#e8c97a',
                        ember: '#8b3a1a',
                        shadow: '#1a0f06',
                    },
                }
            }
        }
    </script>
    <style>
        @font-face {
            font-family: 'RingbearerMedium';
            src: url('/fonts/RingbearerMedium-51mgZ.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>

<body class="bg-shadow text-parchment font-fell min-h-screen">
    <x-tolkien-header />
    <main class="max-w-4xl mx-auto px-6 py-10">
        {{ $slot }}
    </main>
</body>

</html>
