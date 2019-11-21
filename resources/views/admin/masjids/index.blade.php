@extends('layouts.admin')
@section('content')
@can('masjid_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.masjids.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.masjid.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.masjid.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Masjid">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.masjid.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.masjid.fields.negeri') }}
                        </th>
                        <th>
                            {{ trans('cruds.masjid.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.masjid.fields.location') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($masjids as $key => $masjid)
                        <tr data-entry-id="{{ $masjid->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $masjid->id ?? '' }}
                            </td>
                            <td>
                                {{ $masjid->negeri->nama ?? '' }}
                            </td>
                            <td>
                                {{ $masjid->nama ?? '' }}
                            </td>
                            <td>
                                {{ $masjid->location ?? '' }}
                            </td>
                            <td>
                                @can('masjid_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.masjids.show', $masjid->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('masjid_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.masjids.edit', $masjid->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('masjid_delete')
                                    <form action="{{ route('admin.masjids.destroy', $masjid->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('masjid_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.masjids.massDestroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Masjid:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection