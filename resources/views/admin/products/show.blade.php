@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_code') }}
                        </th>
                        <td>
                            {{ $product->product_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_name') }}
                        </th>
                        <td>
                            {{ $product->product_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_mfg') }}
                        </th>
                        <td>
                            {{ $product->product_mfg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_price') }}
                        </th>
                        <td>
                            {{ $product->product_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_type') }}
                        </th>
                        <td>
                            {{ App\Models\Product::PRODUCT_TYPE_RADIO[$product->product_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.product_image') }}
                        </th>
                        <td>
                            @if($product->product_image)
                                <a href="{{ $product->product_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $product->product_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.vendor') }}
                        </th>
                        <td>
                            {{ $product->vendor->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection