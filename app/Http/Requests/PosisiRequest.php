<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosisiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_posisi' => 'required',
            'aksi' => 'required',
            'deskripsi' => 'required',
        ];
    }
}
