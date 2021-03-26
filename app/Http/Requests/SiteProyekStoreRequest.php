<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteProyekStoreRequest extends FormRequest
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
            'koordinat' => 'required|string',
            'nama_proyek' => 'required|string|max:255'
        ];
    }
}
