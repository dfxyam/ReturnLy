<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | ReturnLy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        {{-- 404 Illustration --}}
        <div class="relative mb-8">
            <div class="absolute inset-0 bg-primary-500/10 blur-3xl rounded-full"></div>
            <div class="relative inline-block">
                <svg class="w-64 h-64 mx-auto" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="200" cy="150" r="120" fill="#EEF2FF" />
                    <path d="M150 120 L200 80 L250 120 L250 200 L150 200 Z" fill="#6366F1" opacity="0.2"/>
                    <circle cx="170" cy="140" r="8" fill="#6366F1"/>
                    <circle cx="230" cy="140" r="8" fill="#6366F1"/>
                    <path d="M170 180 Q200 200 230 180" stroke="#6366F1" stroke-width="4" fill="none" stroke-linecap="round"/>
                    <text x="200" y="250" text-anchor="middle" font-size="48" font-weight="bold" fill="#6366F1">404</text>
                </svg>
            </div>
        </div>

        <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">
            Oops! Halaman Tidak Ditemukan
        </h1>
        <p class="text-lg text-text-secondary mb-8 max-w-md mx-auto">
            Maaf, halaman yang Anda cari tidak ada atau telah dipindahkan. Mungkin barang yang Anda cari ada di Lost & Found kami? 😉
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                Kembali ke Home
            </a>
            <a href="{{ url('/found-items') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-border text-text-primary font-semibold rounded-xl hover:bg-surface transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                Cari Barang
            </a>
        </div>

        <p class="text-sm text-text-secondary mt-12">
            Error Code: <span class="font-mono font-semibold">404</span>
        </p>
    </div>
</body>
</html>