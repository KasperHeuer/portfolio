<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Math Tools - Interactive Mathematical Explorations' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-purple-50 font-sans antialiased">

    <div class="min-h-screen flex justify-center px-4 py-16 sm:py-20">
        <div class="w-full max-w-7xl">
            <header class="text-center mb-16 sm:mb-20">
                <h1
                    class="text-5xl sm:text-6xl lg:text-7xl font-black tracking-tight bg-gradient-to-r from-gray-900 via-blue-900 to-purple-900 bg-clip-text text-transparent mb-6">
                    Math Tools
                </h1>
                <p class="mt-6 text-xl sm:text-2xl text-gray-600 font-light max-w-2xl mx-auto">
                    Explore mathematical concepts with interactive tools
                </p>
                <div class="mt-8 flex justify-center gap-2">
                    <div class="h-1 w-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    <div class="h-1 w-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
                </div>
            </header>

            <div class="grid gap-8 sm:gap-10 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                {{ $slot }}
            </div>
        </div>
</body>

</html>
