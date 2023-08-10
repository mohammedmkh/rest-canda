<div class="m-3">
    @can('additional_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.additionals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.additional.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.additional.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-productAdditionals">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.additional.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.additional.fields.price') }}
                            </th>
                            <th>
                                {{ trans('cruds.additional.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.additional.fields.type') }}
                            </th>
                            <th>
                                {{ trans('cruds.additional.fields.product') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($additionals as $key => $additional)
                            <tr data-entry-id="{{ $additional->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $additional->id ?? '' }}
                                </td>
                                <td>
                                    {{ $additional->price ?? '' }}
                                </td>
                                <td>
                                    {{ $additional->name ?? '' }}
                                </td>
                                <td>
                                    {{ $additional->type ?? '' }}
                                </td>
                                <td>
                                    @foreach($additional->products as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('additional_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.additionals.show', $additional->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('additional_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.additionals.edit', $additional->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('additional_delete')
                                        <form action="{{ route('admin.additionals.destroy', $additional->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('additional_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.additionals.massDestroy') }}",
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
  let table = $('.datatable-productAdditionals:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection