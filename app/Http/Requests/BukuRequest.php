<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukuRequest extends FormRequest
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
            'judul' => ['required', 'string', 'max:255'],
            'tahun_rilis' => ['required', 'integer'],
            'halaman' => ['required', 'integer'],
            'isbn' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'text', 'max:255'],
            'bentuk' => ['required', 'string', 'max:255'],
        ];
    }
}
