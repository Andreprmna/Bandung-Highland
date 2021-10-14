<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToyRequest extends FormRequest
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
            'nama_toy'  => ['required', 'string', 'max:255'],
            'jenis'     => ['required', 'string', 'max:255'],
            'genre'     => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string', 'max:255']
        ];
    }
}
