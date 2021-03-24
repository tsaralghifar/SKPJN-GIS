<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenghambatRequest extends FormRequest
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
            'jenis_kejadian' => 'required|max:225',
            'akibat' => 'required|max:225',
            'jam' => 'required',
            'penanggung_jawab' => 'required|max:225'
        ];
    }
}
