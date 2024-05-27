<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'surat_ajuan' => 'required|mimes:pdf',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

    }
        /**
         * Get the error messages for the defined validation rules.
         *
         * @return array<string, string>
         */
        function messages(): array
        {
            return [
                'nama.required' => 'Kolom nama harus diisi.',
                'alamat.required' => 'Kolom alamat harus diisi.',
                'no_hp.required' => 'Kolom nomor telepon harus diisi.',
                'email.required' => 'Kolom email harus diisi.',
                'surat_ajuan.required' => 'Kolom surat pengajuan harus diisi.',
                'surat_ajuan.mimes' => 'Surat pengajuan harus berupa file PDF.',
                'foto.image' => 'Foto harus berupa file gambar.',
                'foto.mimes' => 'Foto harus berupa file JPEG, PNG, JPG, GIF, atau SVG.',
                'foto.max' => 'Ukuran foto tidak boleh lebih dari 2048 kilobytes.',
            ];
        }
    
}
