<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioRequest extends FormRequest
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
            'pengisi_suara' => ['required', 'string', 'max:255'],
            'tahun_rilis' => ['required', 'integer'],
            'genre' => ['required', 'string', 'max:25'],
            'durasi' => ['required', 'string', 'max:25'],
            'format' => ['required', 'string', 'max:10']
        ];
    }
}
