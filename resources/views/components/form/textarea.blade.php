@props([
    'label' => '',
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'required' => false,
])

@php
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
    
    <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        rows="4" 
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-full px-4 py-3 rounded-xl border ' . $errorClass . ' focus:border-primary-500 focus:ring-2 focus:ring-primary-100 outline-none transition bg-white text-text-primary resize-y min-h-[120px]']) }}
    >{{ old($name, $value) }}</textarea>
    
    @error($name)
        <p class="mt-1 text-sm text-danger-500">{{ $message }}</p>
    @enderror
</div>