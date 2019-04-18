<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalonMagangRequest extends FormRequest
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
            'kampus' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'instagram' => 'required',
            'cv' => 'required',
            'portofolio' => 'required',
            'facebook' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'alasan' => 'required',
            'alasan_posisi' => 'required',
            'status' => 'required',

        ];
    }
}
