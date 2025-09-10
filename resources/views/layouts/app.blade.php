<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'VIP2CARS' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="sticky top-0 z-30 bg-white/80 backdrop-blur border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="h-16 flex items-center justify-between">
                <a href="{{ route('vehiculos.index') }}" class="inline-flex items-center gap-2 text-slate-800 font-semibold">
                    <span class="text-2xl">🚗</span>
                    <span>GESTIÓN DE VEHÍCULOS · VIP2CARS</span>
                </a>
                <nav class="flex items-center gap-2">
                    <a href="{{ route('vehiculos.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2">
                        <span>➕ Nuevo</span>
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-8">
        @if(session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 text-emerald-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="mt-10 py-8 text-center text-xs text-slate-500">
        <p>© {{ date('Y') }} VIP2CARS</p>
    </footer>
</body>
</html>


