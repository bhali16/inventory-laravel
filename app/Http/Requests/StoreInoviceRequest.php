<?php

namespace App\Http\Requests;

use App\Models\Inovice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInoviceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inovice_create');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'string',
                'required',
                'unique:inovices',
            ],
            'invoice_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'delivery_method' => [
                'string',
                'nullable',
            ],
            'account' => [
                'string',
                'required',
            ],
            'job_name' => [
                'string',
                'nullable',
            ],
            'branch' => [
                'string',
                'nullable',
            ],
            'delivery_address' => [
                'string',
                'required',
            ],
            'delivery_phone' => [
                'string',
                'required',
            ],
            'billing_address' => [
                'string',
                'nullable',
            ],
            'billing_phone' => [
                'string',
                'nullable',
            ],
            'notes' => [
                'string',
                'nullable',
            ],
            'items_ordereds.*' => [
                'integer',
            ],
            'items_ordereds' => [
                'array',
            ],
            'subtotal' => [
                'required',
            ],
            'restocking' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'other_charges' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'required',
            ],
        ];
    }
}
