<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnggaranKeluarRequest extends FormRequest
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
            'jumlah_keluar' => 'required|max:225',
            'waktu' => 'required',
            'penanggung_jawab' => 'required|max:225'
        ];
    }
}
