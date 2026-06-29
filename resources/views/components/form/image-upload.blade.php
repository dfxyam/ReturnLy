@props([
    'label' => '',
    'name' => 'photo',
    'required' => false,
])

<div>
    @if($label)
        <label class="block text-sm font-medium text-text-primary mb-2">
            {{ $label }}
            @if($required)
                <span class="text-danger-500">*</span>
            @endif
        </label>
    @endif
    
    <div class="flex items-center gap-4">
        <div class="flex-1">
            <label for="{{ $name }}" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-border rounded-xl cursor-pointer bg-surface hover:bg-primary-50 transition-colors">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <x-icon.photo class="w-8 h-8 text-text-secondary mb-2" />
                    <p class="text-sm text-text-secondary">
                        <span class="font-semibold text-primary-500">Klik untuk upload</span> atau seret gambar
                    </p>
                    <p class="text-xs text-text-secondary mt-1">PNG, JPG, WEBP (Max 2MB)</p>
                </div>
                <input id="{{ $name }}" name="{{ $name }}" type="file" class="hidden" accept="image/png,image/jpeg,image/jpg,image/webp" {{ $attributes }} />
            </label>
            @error($name)
                <p class="mt-1 text-sm text-danger-500">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Preview Image --}}
        <div id="{{ $name }}-preview" class="hidden w-32 h-32 rounded-xl overflow-hidden border border-border">
            <img src="" alt="Preview" class="w-full h-full object-cover" id="{{ $name }}-img">
        </div>
    </div>
</div>

<script>
    document.getElementById('{{ $name }}').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('{{ $name }}-preview');
        const img = document.getElementById('{{ $name }}-img');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
            img.src = '';
        }
    });
</script>