<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClaimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'claimant_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'phone_number' => ['required', 'string', 'max:20'],
            'class_name' => ['nullable', 'string', 'max:50'],
            'proof_description' => ['required', 'string', 'min:20'],
            'proof_photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'claimant_name.required' => 'Nama pengklaim wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'proof_description.required' => 'Deskripsi bukti wajib diisi.',
            'proof_description.min' => 'Deskripsi bukti minimal 20 karakter.',
            'proof_photo.image' => 'File harus berupa gambar.',
            'proof_photo.mimes' => 'Format gambar harus JPG, PNG, atau WEBP.',
            'proof_photo.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}