<x-layouts.app title="Welcome">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center space-y-6 p-8">
            <h1 class="text-4xl font-bold text-navy-800">
                 ReturnLy
            </h1>
            <p class="text-lg text-text-secondary">
                Lost & Found System - Setup Berhasil!
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl mx-auto mt-8">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-border">
                    <div class="text-emerald-500 mb-2">
                        <x-icon.check class="w-8 h-8 mx-auto" />
                    </div>
                    <h3 class="font-semibold text-navy-800">Laravel 13</h3>
                    <p class="text-sm text-text-secondary">Framework Ready</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-border">
                    <div class="text-primary-500 mb-2">
                        <x-icon.check class="w-8 h-8 mx-auto" />
                    </div>
                    <h3 class="font-semibold text-navy-800">Tailwind CSS v4</h3>
                    <p class="text-sm text-text-secondary">Styling Ready</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-border">
                    <div class="text-warning-500 mb-2">
                        <x-icon.check class="w-8 h-8 mx-auto" />
                    </div>
                    <h3 class="font-semibold text-navy-800">Font Poppins</h3>
                    <p class="text-sm text-text-secondary">Typography Ready</p>
                </div>
            </div>

            <div class="mt-8 flex flex-wrap gap-3 justify-center">
                <span class="px-4 py-2 bg-navy-800 text-white rounded-full text-sm font-medium">
                    Primary: Navy
                </span>
                <span class="px-4 py-2 bg-primary-500 text-white rounded-full text-sm font-medium">
                    Signal Blue
                </span>
                <span class="px-4 py-2 bg-emerald-500 text-white rounded-full text-sm font-medium">
                    Emerald
                </span>
                <span class="px-4 py-2 bg-danger-500 text-white rounded-full text-sm font-medium">
                    Danger
                </span>
                <span class="px-4 py-2 bg-warning-500 text-white rounded-full text-sm font-medium">
                    Warning
                </span>
            </div>

            <p class="text-sm text-text-secondary mt-8">
                Milestone 1 ✅ Complete - Ready for Milestone 2
            </p>
        </div>
    </div>
</x-layouts.app>