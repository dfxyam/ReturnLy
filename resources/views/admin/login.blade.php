<x-layouts.auth title="Login Admin">
    <div class="min-h-screen flex items-center justify-center bg-surface py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <!-- Logo & Header -->
            <div class="text-center">
                <h1 class="text-4xl font-bold text-navy-800 mb-2">ReturnLy</h1>
                <p class="text-text-secondary mt-2">Admin Dashboard</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-2xl shadow-md border border-border p-8">
                <div class="text-center mb-8">
                    <h2 class="text-xl font-semibold text-text-primary">Login Admin</h2>
                    <p class="text-sm text-text-secondary mt-1">Silakan login untuk mengelola sistem</p>
                </div>

                <!-- Error Alert -->
                @if ($errors->any())
                    <div class="bg-danger-50 border border-danger-200 text-danger-700 px-4 py-3 rounded-xl mb-6 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-text-primary mb-2">
                            Username
                        </label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            value="{{ old('username') }}" 
                            required 
                            autofocus
                            class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary"
                            placeholder="Masukkan username"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-text-primary mb-2">
                            Password
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 rounded-xl border border-border focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary"
                            placeholder="••••••••"
                        >
                    </div>

                    <!-- Login Button -->
                    <button 
                        type="submit"
                        class="w-full bg-primary-500 hover:bg-primary-600 text-white font-semibold py-3 rounded-xl transition shadow-sm hover:shadow-md focus:ring-4 focus:ring-primary-100 mt-8"
                    >
                        Login ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Footer -->
            <p class="text-center text-xs text-text-secondary">
                &copy; {{ date('Y') }} ReturnLy - Lost & Found System
            </p>
        </div>
    </div>
</x-layouts.auth>