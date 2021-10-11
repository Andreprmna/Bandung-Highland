<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class atkRequest extends FormRequest
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
            'nama_atk' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'integer'],
            'jumlah' => ['required', 'integer'],
            'deskripsi_atk' => ['required', 'string', 'max:255']
        ];
    }
}
