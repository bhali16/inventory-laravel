<?php

namespace App\Http\Requests;

use App\Models\InvoiceItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_item_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'unit_price' => [
                'required',
            ],
            'total_price' => [
                'required',
            ],
            'invoice_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
