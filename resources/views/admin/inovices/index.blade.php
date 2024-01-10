@extends('layouts.admin')
@section('content')
@can('inovice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.inovices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.inovice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.inovice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Inovice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.order_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.invoice_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.account') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.job_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.branch') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.delivery_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.billing_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.notes') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.subtotal') }}
                        </th>
                        <th>
                            {{ trans('cruds.inovice.fields.total') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inovices as $key => $inovice)
                        <tr data-entry-id="{{ $inovice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $inovice->id ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->order_no ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->invoice_date ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->delivery_method ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->account ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->job_name ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->branch ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->delivery_address ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->billing_address ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->notes ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->subtotal ?? '' }}
                            </td>
                            <td>
                                {{ $inovice->total ?? '' }}
                            </td>
                            <td>
                                @can('inovice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.inovices.show', $inovice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('inovice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.inovices.edit', $inovice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('inovice_delete')
                                    <form action="{{ route('admin.inovices.destroy', $inovice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('inovice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.inovices.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Inovice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection