@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inovice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inovices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.id') }}
                        </th>
                        <td>
                            {{ $inovice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.order_no') }}
                        </th>
                        <td>
                            {{ $inovice->order_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.invoice_date') }}
                        </th>
                        <td>
                            {{ $inovice->invoice_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_method') }}
                        </th>
                        <td>
                            {{ $inovice->delivery_method }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.account') }}
                        </th>
                        <td>
                            {{ $inovice->account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.job_name') }}
                        </th>
                        <td>
                            {{ $inovice->job_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.branch') }}
                        </th>
                        <td>
                            {{ $inovice->branch }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_address') }}
                        </th>
                        <td>
                            {{ $inovice->delivery_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_phone') }}
                        </th>
                        <td>
                            {{ $inovice->delivery_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.billing_address') }}
                        </th>
                        <td>
                            {{ $inovice->billing_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.billing_phone') }}
                        </th>
                        <td>
                            {{ $inovice->billing_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.notes') }}
                        </th>
                        <td>
                            {{ $inovice->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.items_ordered') }}
                        </th>
                        <td>
                            @foreach($inovice->items_ordereds as $key => $items_ordered)
                                <span class="label label-info">{{ $items_ordered->product_code }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.subtotal') }}
                        </th>
                        <td>
                            {{ $inovice->subtotal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.tax') }}
                        </th>
                        <td>
                            {{ $inovice->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_charges') }}
                        </th>
                        <td>
                            {{ $inovice->delivery_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.freight') }}
                        </th>
                        <td>
                            {{ $inovice->freight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.handling') }}
                        </th>
                        <td>
                            {{ $inovice->handling }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.restocking') }}
                        </th>
                        <td>
                            {{ $inovice->restocking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.other_charges') }}
                        </th>
                        <td>
                            {{ $inovice->other_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inovice.fields.total') }}
                        </th>
                        <td>
                            {{ $inovice->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inovices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection