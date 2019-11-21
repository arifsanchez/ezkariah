@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.masjid.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.masjids.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="negeri_id">{{ trans('cruds.masjid.fields.negeri') }}</label>
                <select class="form-control select2 {{ $errors->has('negeri') ? 'is-invalid' : '' }}" name="negeri_id" id="negeri_id">
                    @foreach($negeris as $id => $negeri)
                        <option value="{{ $id }}" {{ old('negeri_id') == $id ? 'selected' : '' }}>{{ $negeri }}</option>
                    @endforeach
                </select>
                @if($errors->has('negeri_id'))
                    <span class="text-danger">{{ $errors->first('negeri_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.masjid.fields.negeri_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.masjid.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.masjid.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="location">{{ trans('cruds.masjid.fields.location') }}</label>
                <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text" name="location" id="location" value="{{ old('location', '') }}">
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.masjid.fields.location_helper') }}</span>
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