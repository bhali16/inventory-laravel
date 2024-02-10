@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.invoice.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.invoices.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required" for="order_no">{{ trans('cruds.invoice.fields.order_no') }}</label>
                            <input class="form-control {{ $errors->has('order_no') ? 'is-invalid' : '' }}" type="text"
                                name="order_no" id="order_no" value="{{ old('order_no', '') }}" required>
                            @if ($errors->has('order_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.order_no_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required"
                                for="invoice_date">{{ trans('cruds.invoice.fields.invoice_date') }}</label>
                            <input class="form-control date {{ $errors->has('invoice_date') ? 'is-invalid' : '' }}"
                                type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date') }}"
                                required>
                            @if ($errors->has('invoice_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('invoice_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.invoice_date_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="delivery_method">{{ trans('cruds.invoice.fields.delivery_method') }}</label>
                            <input class="form-control {{ $errors->has('delivery_method') ? 'is-invalid' : '' }}"
                                type="text" name="delivery_method" id="delivery_method"
                                value="{{ old('delivery_method', '') }}">
                            @if ($errors->has('delivery_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.delivery_method_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required" for="account">{{ trans('cruds.invoice.fields.account') }}</label>
                            <input class="form-control {{ $errors->has('account') ? 'is-invalid' : '' }}" type="text"
                                name="account" id="account" value="{{ old('account', '') }}" required>
                            @if ($errors->has('account'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.account_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="job_name">{{ trans('cruds.invoice.fields.job_name') }}</label>
                            <input class="form-control {{ $errors->has('job_name') ? 'is-invalid' : '' }}" type="text"
                                name="job_name" id="job_name" value="{{ old('job_name', '') }}">
                            @if ($errors->has('job_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('job_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.job_name_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="branch">{{ trans('cruds.invoice.fields.branch') }}</label>
                            <input class="form-control {{ $errors->has('branch') ? 'is-invalid' : '' }}" type="text"
                                name="branch" id="branch" value="{{ old('branch', '') }}">
                            @if ($errors->has('branch'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.branch_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required"
                                for="delivery_address">{{ trans('cruds.invoice.fields.delivery_address') }}</label>
                            <input class="form-control {{ $errors->has('delivery_address') ? 'is-invalid' : '' }}"
                                type="text" name="delivery_address" id="delivery_address"
                                value="{{ old('delivery_address', '') }}" required>
                            @if ($errors->has('delivery_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.delivery_address_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label class="required"
                                for="delivery_phone">{{ trans('cruds.invoice.fields.delivery_phone') }}</label>
                            <input class="form-control {{ $errors->has('delivery_phone') ? 'is-invalid' : '' }}"
                                type="text" name="delivery_phone" id="delivery_phone"
                                value="{{ old('delivery_phone', '') }}" required>
                            @if ($errors->has('delivery_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.delivery_phone_helper') }}</span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="billing_address">{{ trans('cruds.invoice.fields.billing_address') }}</label>
                            <input class="form-control {{ $errors->has('billing_address') ? 'is-invalid' : '' }}"
                                type="text" name="billing_address" id="billing_address"
                                value="{{ old('billing_address', '') }}">
                            @if ($errors->has('billing_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('billing_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.billing_address_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="billing_phone">{{ trans('cruds.invoice.fields.billing_phone') }}</label>
                            <input class="form-control {{ $errors->has('billing_phone') ? 'is-invalid' : '' }}"
                                type="text" name="billing_phone" id="billing_phone"
                                value="{{ old('billing_phone', '') }}">
                            @if ($errors->has('billing_phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('billing_phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.billing_phone_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="other_charges">{{ trans('cruds.invoice.fields.other_charges') }}</label>
                            <input class="form-control {{ $errors->has('other_charges') ? 'is-invalid' : '' }}"
                                type="number" name="other_charges" id="other_charges"
                                value="{{ old('other_charges', '0') }}" step="1">
                            @if ($errors->has('other_charges'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('other_charges') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.other_charges_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="delivery_charges">{{ trans('cruds.invoice.fields.delivery_charges') }}</label>
                            <input class="form-control {{ $errors->has('delivery_charges') ? 'is-invalid' : '' }}"
                                type="number" name="delivery_charges" id="delivery_charges"
                                value="{{ old('delivery_charges', '0') }}" step="0.01">
                            @if ($errors->has('delivery_charges'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_charges') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.delivery_charges_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tax">{{ trans('cruds.invoice.fields.tax') }}</label>
                            <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number"
                                name="tax" id="tax" value="{{ old('tax', '0') }}" step="0.01">
                            @if ($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.tax_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="freight">{{ trans('cruds.invoice.fields.freight') }}</label>
                            <input class="form-control {{ $errors->has('freight') ? 'is-invalid' : '' }}" type="number"
                                name="freight" id="freight" value="{{ old('freight', '0') }}" step="0.01">
                            @if ($errors->has('freight'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('freight') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.freight_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="handling">{{ trans('cruds.invoice.fields.handling') }}</label>
                            <input class="form-control {{ $errors->has('handling') ? 'is-invalid' : '' }}" type="number"
                                name="handling" id="handling" value="{{ old('handling', '0') }}" step="0.01">
                            @if ($errors->has('handling'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('handling') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.handling_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="restocking">{{ trans('cruds.invoice.fields.restocking') }}</label>
                            <input class="form-control {{ $errors->has('restocking') ? 'is-invalid' : '' }}"
                                type="number" name="restocking" id="restocking" value="{{ old('restocking', '0') }}"
                                step="1">
                            @if ($errors->has('restocking'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('restocking') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.restocking_helper') }}</span>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="notes">{{ trans('cruds.invoice.fields.notes') }}</label>
                            <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text"
                                name="notes" id="notes" value="{{ old('notes', '') }}">
                            @if ($errors->has('notes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('notes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.notes_helper') }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="products">Select Products</label>
                            <select class="form-control {{ $errors->has('products') ? 'is-invalid' : '' }} product_select"
                                id="productSelect">
                                @foreach ($products as $id => $product)
                                    <option data-unit-price="{{ $product->product_price }}" value="{{ $product->id }}"
                                        {{ in_array($product->id, old('products', [])) ? 'selected' : '' }}>
                                        {{ $product->product_name }} - {{ $product->product_code }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>.</label>
                            <button style="background: #321fdb;color: white;" class="form-control btn" type="button"
                                id="addProductButton">Add Product</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <table class="table table-bordered table-sm" id="productTable">
                        <thead>
                            <tr>
                                <th scope="col">Product Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Unit Price ($)</th>
                                <th scope="col">Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                        </tbody>
                        <tfoot>
                            <tr class="text-right">
                                <td colspan="3">
                                    <h4>Subtotal</h4>
                                </td>
                                <td>
                                    <h4 id="total_subtotal_price">0</h4>
                                </td>
                            </tr>
                            <tr class="text-right">
                                <td colspan="3">
                                    <h4>Delivery</h4>
                                </td>
                                <td>
                                    <h4 id="total_shipping_price">0</h4>
                                </td>
                            </tr>
                            <tr class="text-right">
                                <td colspan="3">
                                    <h4>Tax</h4>
                                </td>
                                <td>
                                    <h4 id="total_tax">0</h4>
                                </td>
                            </tr>

                            <tr class="text-right">
                                <td colspan="3">
                                    <h4>Total</h4>
                                </td>
                                <td>
                                    <h1 id="total_price">0</h1>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>






                <div class="form-group d-none">
                    <label class="required" for="subtotal">{{ trans('cruds.invoice.fields.subtotal') }}</label>
                    <input class="form-control {{ $errors->has('subtotal') ? 'is-invalid' : '' }}" type="number"
                        name="subtotal" id="subtotal" value="{{ old('subtotal', '') }}" step="0.01" required>
                    @if ($errors->has('subtotal'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subtotal') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.subtotal_helper') }}</span>
                </div>
                <div class="form-group d-none">
                    <label class="required" for="total">{{ trans('cruds.invoice.fields.total') }}</label>
                    <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number"
                        name="total" id="order_total" value="{{ old('total', '0') }}" step="0.01" required>
                    @if ($errors->has('total'))
                        <div class="invalid-feedback">
                            {{ $errors->first('total') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.invoice.fields.total_helper') }}</span>
                </div>
                <hr>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@section('scripts')
    <script>
        function updatePrices() {
            let total_price = 0;
            let total_subtotal_price = 0;
            let total_shipping_price = parseFloat($('#delivery_charges').val());
            $('.total_price_').each(function() {
                total_subtotal_price += parseInt($(this).val());
            });
            total_price = total_subtotal_price + total_shipping_price;
            $('#total_price').text(total_price);
            $('#order_total').val(total_price);
            $('#total_subtotal_price').text(total_subtotal_price);
            $('#subtotal').val(total_subtotal_price);
        }

        $(document).ready(function() {
            $('#is_approved').val(0);
            var productCount = 0;
            $("#addProductButton").click(function() {
                const selectedProduct = $("#productSelect").val();
                let productExist = 0;
                if ($('.product_id').length > 0) {
                    $('.product_id').each(function() {
                        if (selectedProduct == $(this).val()) {
                            productExist = 1;
                            return;
                        }
                    })
                }
                if (productExist) {
                    alert('Product already added in List');
                    return;
                }

                const productDetails = {
                    id: selectedProduct,
                    name: $("#productSelect").find(":selected").text(),
                    quantity: 1,
                    product_price: parseFloat($("#productSelect").find(":selected").data('unit-price')),
                };

                const tableRow = $("<tr>");
                $("<td>").text(productDetails.name).appendTo(tableRow);
                const quantityInput = $("<input min='1' name='product[" + productCount +
                    "][quantity]' type='number' class='form-control qty_input' value='1'>");
                $("<td class='quantityInput'>").append(quantityInput).appendTo(tableRow);
                $("<td>").text(productDetails.product_price).appendTo(tableRow);
                console.log("productDetails: ", productDetails);
                const total_price = productDetails.quantity * productDetails.product_price;
                $("<td>").text(total_price).appendTo(tableRow);
                var html = "<input name='product[" + productCount +
                    "][product_price]' type='hidden' class='form-control product_price_' value='" +
                    productDetails.product_price + "'>";
                html += "<input name='product[" + productCount +
                    "][product_id]' type='hidden' class='form-control product_id' value='" + productDetails
                    .id + "'>";
                html += "<input name='product[" + productCount +
                    "][total_price]' type='hidden' class='form-control total_price_' value='" +
                    total_price + "'>";
                $(tableRow).append(html);
                const removeButton = $(
                    "<span class='removeProduct badge badge-danger ' style='cursor:pointer;'>").text(
                    "Remove");
                $("<td>").append(removeButton).appendTo(tableRow);
                $("#productTableBody").append(tableRow);
                productCount++;
                updatePrices();
            });
            $(document).on('change', '.qty_input', function() {
                var maxQty = parseInt($(this).attr('max'));
                var tableRow = $(this).parents('tr');
                //get unit price of current product
                var unit_price = parseFloat(tableRow.find(".product_price_").val());
                var qty = parseInt($(this).val());

                if ($(this).val() < 1) {
                    alert("Quantity must be greater than 0");
                    return;
                }
                console.log("unit_price: ", unit_price);

                const total_price = qty * unit_price;
                tableRow.find("td").eq(3).text(total_price);
                tableRow.find(".total_price_").val(total_price);
                var delivery_charges = parseFloat($('#delivery_charges').val());
                let total_subtotal_price = 0;
                $('.product_price_').each(function() {
                    const qty = $(this).parents('tr').find('.qty_input').val();
                    const unit_price = parseFloat($(this).val());
                    total_subtotal_price += unit_price * qty;
                })

                let total = total_subtotal_price + delivery_charges;

                $('#total_subtotal_price').text(total_subtotal_price);
                $('#total_price').text(parseFloat(total));
                $('#order_total').val(total);
                $('#subtotal').val(total_subtotal_price)
                console.log("Total: ", total);
                console.log("SubTotal: ", total_subtotal_price);
                console.log("Shipping: ", delivery_charges);
            });
            $(document).on('click', '.removeProduct', function() {
                $(this).parents('tr').remove();
                updatePrices();
            });
            $('#delivery_charges').on('change', function(e) {
                e.preventDefault();
                var delivery_charges = $(this).val();
                var total = parseInt($('#subtotal').val()) + parseInt(delivery_charges);
                $('#total_price').text(total);
                $('#order_total').val(total);
                $('#total_shipping_price').text(delivery_charges);
            });

            //apply tax on subtotal
            $('#tax').on('change', function(e) {
                e.preventDefault();
                var tax = $(this).val();
                var subtotal = $('#subtotal').val();
                var tax_amount = (subtotal * tax) / 100;
                var total = parseInt(subtotal) + parseInt(tax_amount);
                $('#total_tax').text(tax);
                $('#total_price').text(total);
                $('#order_total').val(total);
            });

        });
    </script>
@endsection



@endsection
