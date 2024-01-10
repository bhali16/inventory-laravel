<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'product_code' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:products,product_code,' . request()->route('product')->id,
            ],
            'product_name' => [
                'string',
                'required',
            ],
            'product_mfg' => [
                'string',
                'nullable',
            ],
            'product_price' => [
                'required',
            ],
            'product_type' => [
                'required',
            ],
        ];
    }
}
