@props([
    'label' => '',
    'name' => '',
    'options' => [],
    'placeholder' => 'Pilih...',
    'required' => false,
])

@php
    // Cek apakah ada error untuk field ini, jika ya gunakan border merah
    $errorClass = $errors->has($name) ? 'border-danger-500' : 'border-border';
@endphp

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-text-primary mb-2">
            {{ $label }}
            @if($required)
                <span class="text-danger-500">*</span>
            @endif
        </label>
    @endif
    
    <select 
        id="{{ $name }}" 
        name="{{ $name }}" 
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full px-4 py-3 rounded-xl border ' . $errorClass . ' focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary']) }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ old($name) == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    
    @error($name)
        <p class="mt-1 text-sm text-danger-500">{{ $message }}</p>
    @enderror
</div>