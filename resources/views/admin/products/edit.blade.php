@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_code">{{ trans('cruds.product.fields.product_code') }}</label>
                <input class="form-control {{ $errors->has('product_code') ? 'is-invalid' : '' }}" type="number" name="product_code" id="product_code" value="{{ old('product_code', $product->product_code) }}" step="1" required>
                @if($errors->has('product_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_name">{{ trans('cruds.product.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}" required>
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_mfg">{{ trans('cruds.product.fields.product_mfg') }}</label>
                <input class="form-control {{ $errors->has('product_mfg') ? 'is-invalid' : '' }}" type="text" name="product_mfg" id="product_mfg" value="{{ old('product_mfg', $product->product_mfg) }}">
                @if($errors->has('product_mfg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_mfg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_mfg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_price">{{ trans('cruds.product.fields.product_price') }}</label>
                <input class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}" type="number" name="product_price" id="product_price" value="{{ old('product_price', $product->product_price) }}" step="0.01" required>
                @if($errors->has('product_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.product.fields.product_type') }}</label>
                @foreach(App\Models\Product::PRODUCT_TYPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('product_type') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="product_type_{{ $key }}" name="product_type" value="{{ $key }}" {{ old('product_type', $product->product_type) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="product_type_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('product_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_image">{{ trans('cruds.product.fields.product_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('product_image') ? 'is-invalid' : '' }}" id="product_image-dropzone">
                </div>
                @if($errors->has('product_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_image_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.productImageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="product_image"]').remove()
      $('form').append('<input type="hidden" name="product_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="product_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->product_image)
      var file = {!! json_encode($product->product_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="product_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection