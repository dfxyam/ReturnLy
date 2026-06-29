<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLostItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reporter_name' => ['required', 'string', 'max:100'],
            'class_name' => ['nullable', 'string', 'max:50'],
            'phone_number' => ['required', 'string', 'max:20'],
            'item_name' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'exists:categories,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'lost_date' => ['required', 'date', 'before_or_equal:today'],
            'description' => ['required', 'string', 'min:10'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'reporter_name.required' => 'Nama pelapor wajib diisi.',
            'phone_number.required' => 'Nomor WhatsApp wajib diisi.',
            'item_name.required' => 'Nama barang wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'location_id.required' => 'Lokasi wajib dipilih.',
            'lost_date.required' => 'Tanggal kehilangan wajib diisi.',
            'lost_date.before_or_equal' => 'Tanggal tidak boleh di masa depan.',
            'description.required' => 'Deskripsi barang wajib diisi.',
            'description.min' => 'Deskripsi minimal 10 karakter.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus JPG, PNG, atau WEBP.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}