<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
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
            'brand'         => 'required|max:30|min:2',
            'name'          => 'required|min:2|max:255',
            'category_id'   => 'required|integer|exists:categories,id',
            'laboratory_id' => 'required|integer|exists:laboratories,id',
            'buy_date'      => 'required|date',
            'unboxing_date' => 'required|date',
            'condition'     => 'required|in:Rusak,Baik,Hilang',
            'description'   => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'brand.required'         => 'Nama merk wajib diisi',
            'brand.min'              => 'Nama merk minimal 2 karakter',
            'brand.max'              => 'Nama merk maksimal 30 karakter',
            'name.required'          => 'Nama barang wajib diisi',
            'name.min'               => 'Nama barang minimal 2 karakter',
            'name.max'               => 'Nama barang maksimal 255 karakter',
            'category_id.required'   => 'Nama ruangan wajib dipilih.',
            'laboratory_id.required'   => 'Nama ruangan wajib dipilih.',
            'buy_date.required'      => 'Tanggal pembelian wajib diisi',
            'unboxing_date.required' => 'Tanggal pemakaian pertama wajib diisi',
            'condition.required'     => 'Kondisi barang wajib diisi',
        ];
    }
}
