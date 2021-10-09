<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pinjam_toyRequest extends FormRequest
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
            'waktu_mulai' => ['required', 'date'],
            'waktu_selesai' => ['required', 'date'],
            'tgl_pengembalian' => ['required', 'date'],
        ];
    }
}
