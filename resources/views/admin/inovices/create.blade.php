@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.inovice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.inovices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="order_no">{{ trans('cruds.inovice.fields.order_no') }}</label>
                <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="text" name="order_no" id="order_no" value="{{ old('order_no', '') }}" required>
                @if($errors->has('order_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_no') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.order_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_date">{{ trans('cruds.inovice.fields.invoice_date') }}</label>
                <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}" required>
                @if($errors->has('invoice_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invoice_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.invoice_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_method">{{ trans('cruds.inovice.fields.delivery_method') }}</label>
                <input class="form-control {{ $errors->has('delivery_method') ? 'is-invalid' : '' }}" type="text" name="delivery_method" id="delivery_method" value="{{ old('delivery_method', '') }}">
                @if($errors->has('delivery_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.delivery_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account">{{ trans('cruds.inovice.fields.account') }}</label>
                <input class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}" type="text" name="account" id="account" value="{{ old('account', '') }}" required>
                @if($errors->has('account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.account_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_name">{{ trans('cruds.inovice.fields.job_name') }}</label>
                <input class="form-control {{ $errors->has('job_name') ? 'is-invalid' : '' }}" type="text" name="job_name" id="job_name" value="{{ old('job_name', '') }}">
                @if($errors->has('job_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.job_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="branch">{{ trans('cruds.inovice.fields.branch') }}</label>
                <input class="form-control {{ $errors->has('branch') ? 'is-invalid' : '' }}" type="text" name="branch" id="branch" value="{{ old('branch', '') }}">
                @if($errors->has('branch'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.branch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_address">{{ trans('cruds.inovice.fields.delivery_address') }}</label>
                <input class="form-control {{ $errors->has('delivery_address') ? 'is-invalid' : '' }}" type="text" name="delivery_address" id="delivery_address" value="{{ old('delivery_address', '') }}" required>
                @if($errors->has('delivery_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.delivery_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="delivery_phone">{{ trans('cruds.inovice.fields.delivery_phone') }}</label>
                <input class="form-control {{ $errors->has('delivery_phone') ? 'is-invalid' : '' }}" type="text" name="delivery_phone" id="delivery_phone" value="{{ old('delivery_phone', '') }}" required>
                @if($errors->has('delivery_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.delivery_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_address">{{ trans('cruds.inovice.fields.billing_address') }}</label>
                <input class="form-control {{ $errors->has('billing_address') ? 'is-invalid' : '' }}" type="text" name="billing_address" id="billing_address" value="{{ old('billing_address', '') }}">
                @if($errors->has('billing_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billing_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.billing_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="billing_phone">{{ trans('cruds.inovice.fields.billing_phone') }}</label>
                <input class="form-control {{ $errors->has('billing_phone') ? 'is-invalid' : '' }}" type="text" name="billing_phone" id="billing_phone" value="{{ old('billing_phone', '') }}">
                @if($errors->has('billing_phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('billing_phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.billing_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.inovice.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="items_ordereds">{{ trans('cruds.inovice.fields.items_ordered') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('items_ordereds') ? 'is-invalid' : '' }}" name="items_ordereds[]" id="items_ordereds" multiple>
                    @foreach($items_ordereds as $id => $items_ordered)
                        <option value="{{ $id }}" {{ in_array($id, old('items_ordereds', [])) ? 'selected' : '' }}>{{ $items_ordered }}</option>
                    @endforeach
                </select>
                @if($errors->has('items_ordereds'))
                    <div class="invalid-feedback">
                        {{ $errors->first('items_ordereds') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.items_ordered_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="subtotal">{{ trans('cruds.inovice.fields.subtotal') }}</label>
                <input class="form-control {{ $errors->has('subtotal') ? 'is-invalid' : '' }}" type="number" name="subtotal" id="subtotal" value="{{ old('subtotal', '') }}" step="0.01" required>
                @if($errors->has('subtotal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtotal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.subtotal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.inovice.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', '0') }}" step="0.01">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="delivery_charges">{{ trans('cruds.inovice.fields.delivery_charges') }}</label>
                <input class="form-control {{ $errors->has('delivery_charges') ? 'is-invalid' : '' }}" type="number" name="delivery_charges" id="delivery_charges" value="{{ old('delivery_charges', '0') }}" step="0.01">
                @if($errors->has('delivery_charges'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delivery_charges') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.delivery_charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="freight">{{ trans('cruds.inovice.fields.freight') }}</label>
                <input class="form-control {{ $errors->has('freight') ? 'is-invalid' : '' }}" type="number" name="freight" id="freight" value="{{ old('freight', '0') }}" step="0.01">
                @if($errors->has('freight'))
                    <div class="invalid-feedback">
                        {{ $errors->first('freight') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.freight_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="handling">{{ trans('cruds.inovice.fields.handling') }}</label>
                <input class="form-control {{ $errors->has('handling') ? 'is-invalid' : '' }}" type="number" name="handling" id="handling" value="{{ old('handling', '0') }}" step="0.01">
                @if($errors->has('handling'))
                    <div class="invalid-feedback">
                        {{ $errors->first('handling') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.handling_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="restocking">{{ trans('cruds.inovice.fields.restocking') }}</label>
                <input class="form-control {{ $errors->has('restocking') ? 'is-invalid' : '' }}" type="number" name="restocking" id="restocking" value="{{ old('restocking', '0') }}" step="1">
                @if($errors->has('restocking'))
                    <div class="invalid-feedback">
                        {{ $errors->first('restocking') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.restocking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_charges">{{ trans('cruds.inovice.fields.other_charges') }}</label>
                <input class="form-control {{ $errors->has('other_charges') ? 'is-invalid' : '' }}" type="number" name="other_charges" id="other_charges" value="{{ old('other_charges', '0') }}" step="1">
                @if($errors->has('other_charges'))
                    <div class="invalid-feedback">
                        {{ $errors->first('other_charges') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.other_charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.inovice.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '0') }}" step="0.01" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.inovice.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection