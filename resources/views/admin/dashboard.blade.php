<x-layouts.app title="Dashboard">
    <div class="min-h-screen flex flex-col items-center justify-center p-8">
        <h1 class="text-3xl font-bold text-navy-800 mb-4">Dashboard Admin</h1>
        <p class="text-text-secondary mb-8">Anda berhasil login sebagai {{ auth()->user()->username }}</p>
        
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-danger-500 hover:bg-danger-600 text-white px-6 py-3 rounded-xl transition">
                Logout
            </button>
        </form>
    </div>
</x-layouts.app>