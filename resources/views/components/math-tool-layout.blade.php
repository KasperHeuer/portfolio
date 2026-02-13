<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Math Tools - Interactive Mathematical Explorations' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col justify-between px-4 pt-6 pb-8 sm:pt-8 sm:pb-12 lg:pt-10 lg:pb-16">
        <div class="w-full max-w-7xl mx-auto flex flex-col items-center">

            <header class="text-center mb-7 sm:mb-9">
                <h1
                    class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent mb-4">
                    Math Tools
                </h1>
                <p class="mt-4 text-lg sm:text-xl md:text-2xl text-gray-600 font-light max-w-3xl mx-auto">
                    Explore mathematical concepts with interactive tools
                </p>
                <div class="mt-6 flex justify-center gap-3">
                    <div class="h-1 w-20 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    <div class="h-1 w-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                </div>
            </header>

            <main class="w-full max-w-full mx-auto px-4 md:px-0 flex-1 flex flex-col items-center">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>

</html>
