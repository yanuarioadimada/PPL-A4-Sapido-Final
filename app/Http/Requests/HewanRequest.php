<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HewanRequest extends FormRequest
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
            'jenis_kelamin' => 'required|in:jantan,betina',
            'keterangan' => 'required',
            'jenis_hewan' => 'required|in:sapi,kambing',
            'nomor_hewan' => 'required|unique:hewan,nomor_hewan',
            'gambar' => 'nullable|image',
            'id_induk' => 'nullable|exists:hewan,id',
            'id_profile' => 'required|exists:profile,id',
        ];
        // return [];
    }
}
