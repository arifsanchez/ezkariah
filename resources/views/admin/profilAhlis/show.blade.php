@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profilAhli.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profil-ahlis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.profilAhli.fields.id') }}
                        </th>
                        <td>
                            {{ $profilAhli->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profilAhli.fields.nama_penuh') }}
                        </th>
                        <td>
                            {{ $profilAhli->nama_penuh }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profilAhli.fields.no_kad_pengenalan') }}
                        </th>
                        <td>
                            {{ $profilAhli->no_kad_pengenalan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profilAhli.fields.ictype') }}
                        </th>
                        <td>
                            {{ $profilAhli->ictype->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profilAhli.fields.jantina') }}
                        </th>
                        <td>
                            {{ $profilAhli->jantina->nama ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.profil-ahlis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection