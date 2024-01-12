@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.id') }}
                        </th>
                        <td>
                            {{ $invoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.order_no') }}
                        </th>
                        <td>
                            {{ $invoice->order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $invoice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.delivery_method') }}
                        </th>
                        <td>
                            {{ $invoice->delivery_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.account') }}
                        </th>
                        <td>
                            {{ $invoice->account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.job_name') }}
                        </th>
                        <td>
                            {{ $invoice->job_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.branch') }}
                        </th>
                        <td>
                            {{ $invoice->branch }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.delivery_address') }}
                        </th>
                        <td>
                            {{ $invoice->delivery_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.delivery_phone') }}
                        </th>
                        <td>
                            {{ $invoice->delivery_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $invoice->billing_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.billing_phone') }}
                        </th>
                        <td>
                            {{ $invoice->billing_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.notes') }}
                        </th>
                        <td>
                            {{ $invoice->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.subtotal') }}
                        </th>
                        <td>
                            {{ $invoice->subtotal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.tax') }}
                        </th>
                        <td>
                            {{ $invoice->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.delivery_charges') }}
                        </th>
                        <td>
                            {{ $invoice->delivery_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.freight') }}
                        </th>
                        <td>
                            {{ $invoice->freight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.handling') }}
                        </th>
                        <td>
                            {{ $invoice->handling }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.restocking') }}
                        </th>
                        <td>
                            {{ $invoice->restocking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.other_charges') }}
                        </th>
                        <td>
                            {{ $invoice->other_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoice.fields.total') }}
                        </th>
                        <td>
                            {{ $invoice->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection