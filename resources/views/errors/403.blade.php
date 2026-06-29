<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | ReturnLy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface min-h-screen flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <div class="relative mb-8">
            <div class="absolute inset-0 bg-warning-500/10 blur-3xl rounded-full"></div>
            <div class="relative inline-block">
                <svg class="w-64 h-64 mx-auto" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="200" cy="150" r="120" fill="#FFFBEB" />
                    <rect x="160" y="130" width="80" height="70" rx="8" fill="#F59E0B" opacity="0.3"/>
                    <path d="M175 130 V110 Q175 90 200 90 Q225 90 225 110 V130" stroke="#F59E0B" stroke-width="6" fill="none"/>
                    <circle cx="200" cy="165" r="6" fill="#F59E0B"/>
                    <text x="200" y="260" text-anchor="middle" font-size="32" font-weight="bold" fill="#F59E0B">403</text>
                </svg>
            </div>
        </div>

        <h1 class="text-4xl sm:text-5xl font-bold text-navy-800 mb-4">
            Akses Ditolak
        </h1>
        <p class="text-lg text-text-secondary mb-8 max-w-md mx-auto">
            Anda tidak memiliki izin untuk mengakses halaman ini. Silakan login dengan akun yang sesuai atau hubungi administrator.
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary-500 text-white font-semibold rounded-xl hover:bg-primary-600 transition-colors">
                Kembali ke Home
            </a>
            @auth
                <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-border text-text-primary font-semibold rounded-xl hover:bg-surface transition-colors">
                    Halaman Sebelumnya
                </a>
            @else
                <a href="{{ url('/admin/login') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-border text-text-primary font-semibold rounded-xl hover:bg-surface transition-colors">
                    Login Admin
                </a>
            @endauth
        </div>

        <p class="text-sm text-text-secondary mt-12">
            Error Code: <span class="font-mono font-semibold">403</span>
        </p>
    </div>
</body>
</html>