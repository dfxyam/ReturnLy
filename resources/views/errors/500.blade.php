<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | ReturnLy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <div class="relative mb-8">
            <div class="absolute inset-0 bg-danger-500/10 blur-3xl rounded-full"></div>
            <div class="relative inline-block">
                <svg class="w-64 h-64 mx-auto" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="200" cy="150" r="120" fill="#FEF2F2" />
                    <path d="M200 80 L200 170" stroke="#EF4444" stroke-width="12" stroke-linecap="round"/>
                    <circle cx="200" cy="210" r="8" fill="#EF4444"/>
                    <text x="200" y="270" text-anchor="middle" font-size="32" font-weight="bold" fill="#EF4444">500</text>
                </svg>
            </div>
        </div>

        <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">
            Ada Masalah di Server Kami
        </h1>
        <p class="text-lg text-text-secondary mb-8 max-w-md mx-auto">
            Kami sedang mengalami masalah teknis. Tim kami sudah diberitahu dan sedang memperbaikinya. Silakan coba beberapa saat lagi.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <button onclick="location.reload()" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
                Coba Lagi
            </button>
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-border text-text-primary font-semibold rounded-xl hover:bg-surface transition-colors">
                Kembali ke Home
            </a>
        </div>

        <p class="text-sm text-text-secondary mt-12">
            Error Code: <span class="font-mono font-semibold">500</span>
        </p>
    </div>
</body>
</html>