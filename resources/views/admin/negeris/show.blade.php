@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.negeri.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.negeris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.negeri.fields.id') }}
                        </th>
                        <td>
                            {{ $negeri->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.negeri.fields.nama') }}
                        </th>
                        <td>
                            {{ $negeri->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.negeri.fields.jabatan') }}
                        </th>
                        <td>
                            {{ $negeri->jabatan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.negeris.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection