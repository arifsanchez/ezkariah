@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.negeri.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.negeris.update", [$negeri->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.negeri.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $negeri->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.negeri.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jabatan">{{ trans('cruds.negeri.fields.jabatan') }}</label>
                <input class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $negeri->jabatan) }}">
                @if($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.negeri.fields.jabatan_helper') }}</span>
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