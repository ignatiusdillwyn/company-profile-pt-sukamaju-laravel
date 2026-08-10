<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
// use App\Rules\RuleFullName;

class ArticleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // $this->merge([
        //     'no_hp' => preg_replace('/[\s\-]+/', '', (string) $this->input('no_hp')),
        // ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'content' => ['nullable', 'string', 'min:10', 'max:2500'],
            'imageName' => ['required', 'file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    /**
     * Pesan error custom per aturan (menimpa pesan default Laravel).
     */
    public function messages(): array
    {
        return [
            // 'email.required'            => 'Jangan pakai email ini',
            // 'tanggal_lahir.before'    => 'Tanggal lahir tidak boleh hari ini atau masa depan.',
            // 'alamat.min' => 'Alamat harus minimal 20 karakter.',
            // 'alasan_premium.required_if' => 'Alasan wajib diisi untuk kategori premium.',
            // 'terms.accepted'  => 'Anda harus menyetujui syarat & ketentuan sebelum mendaftar.',
            // 'foto_ktp.image'          => 'File Image upload harus berupa gambar (jpg/jpeg/png).',
        ];
    }

    /**
     * Nama atribut yang dipakai Laravel saat merangkai pesan error default.
     */
    public function attributes(): array
    {
        return [
            // 'full_name' => 'Full Name',
            // 'email'        => 'Email',
            // 'phone' => 'Phone Number',
            // 'notes' => 'Message',
        ];
    }
}
