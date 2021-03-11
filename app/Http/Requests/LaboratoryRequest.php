<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoryRequest extends FormRequest
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
            'name'   => 'required|max:50|min:3',
            'author' => 'required|min:3|max:75'
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Nama ruangan wajib diisi',
            'name.max'        => 'Nama ruangan maksimal 50 karakter',
            'name.min'        => 'Nama ruangan minimal 3 karakter',
            'code.required'   => 'Kode ruangan wajib diisi',
            'code.min'        => 'Kode ruangan minimal 3 karakter',
            'code.max'        => 'Kode ruangan maksimal 6 karakter',
            'code.unique'     => 'Kode ruangan sudah ada',
            'author.required' => 'Nama penanggung jawab wajib diisi',
            'author.min'      => 'Nama penanggung jawab minimal 3 karakter',
            'author.max'      => 'Nama penanggung jawab maksimal 75 karakter' 
        ];
    }
}
