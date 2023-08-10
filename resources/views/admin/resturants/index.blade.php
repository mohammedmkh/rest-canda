@extends('layouts.admin')
@section('content')
@can('resturant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.resturants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.resturant.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.resturant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Resturant">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.facebook') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.twitter') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.instagram') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.lat') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.long') }}
                    </th>
                    <th>
                        {{ trans('cruds.resturant.fields.image') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('resturant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.resturants.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.resturants.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'facebook', name: 'facebook' },
{ data: 'twitter', name: 'twitter' },
{ data: 'instagram', name: 'instagram' },
{ data: 'lat', name: 'lat' },
{ data: 'long', name: 'long' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Resturant').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection