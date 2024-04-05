<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
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
            'nik' => 'required',
            'pangkat_id' => 'required',
            'tmt_pangkat' => 'required',
            'jabatan' => 'required',
            'tmt_jabatan' => 'required',
            'eselon' => 'required',
            'bagian_wilayah' => 'required',
        ];
    }
}
