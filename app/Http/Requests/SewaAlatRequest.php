<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SewaAlatRequest extends FormRequest
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
            'jenis_alat' => 'required|max:225',
            'tanggal_sewa' => 'required|max:225',
            'keperluan' => 'required|max:225',
            'biaya_sewa' => 'required|max:225'
        ];
    }
}
