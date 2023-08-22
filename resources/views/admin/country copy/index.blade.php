@extends('layouts.admin')
@section('content')
    @can('product_category_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.city.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.city.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.city.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-ProductCategory">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.city.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.city.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.country.fields.name') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($city as $key => $city)
                            <tr data-entry-id="{{ $city->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $city->id ?? '' }}
                                </td>
                                <td>
                                    {{ $city->name ?? '' }}
                                </td>
                                <td>
                                    {{ $city->country->name ?? '' }}
                                </td>

                                <td>
                                    @can('product_category_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.city.show', $city->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('product_category_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.city.edit', $city->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('product_category_delete')
                                        <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
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
        $(function() {


            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
