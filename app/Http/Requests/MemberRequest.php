<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'password' => $this->passwordRules(),

        ];
    }
}
