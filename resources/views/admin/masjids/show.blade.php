@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.masjid.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.masjids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.masjid.fields.id') }}
                        </th>
                        <td>
                            {{ $masjid->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masjid.fields.negeri') }}
                        </th>
                        <td>
                            {{ $masjid->negeri->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masjid.fields.nama') }}
                        </th>
                        <td>
                            {{ $masjid->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.masjid.fields.location') }}
                        </th>
                        <td>
                            {{ $masjid->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.masjids.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection