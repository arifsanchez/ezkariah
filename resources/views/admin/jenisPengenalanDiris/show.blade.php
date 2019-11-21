@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jenisPengenalanDiri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-pengenalan-diris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisPengenalanDiri.fields.id') }}
                        </th>
                        <td>
                            {{ $jenisPengenalanDiri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisPengenalanDiri.fields.nama') }}
                        </th>
                        <td>
                            {{ $jenisPengenalanDiri->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-pengenalan-diris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection