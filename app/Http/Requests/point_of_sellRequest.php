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
}
