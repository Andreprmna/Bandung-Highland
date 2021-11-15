<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class point_of_sellRequest extends FormRequest
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
            'jumlah_pos' => ['required', 'integer'],
            'tgl_pos' => ['required', 'date'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'jumlah_pos.integer' => 'Jumlah harus berupa angka/nomor!'
        ];
    }
}
