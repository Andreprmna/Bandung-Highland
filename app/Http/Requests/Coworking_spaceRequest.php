<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Coworking_spaceRequest extends FormRequest
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
            'nomor_cs' => ['required', 'string', 'max:10'],
            'deskripsi_cs' => ['required', 'string'],
            'daya_tampung' => ['required', 'integer']
        ];
    }
}
