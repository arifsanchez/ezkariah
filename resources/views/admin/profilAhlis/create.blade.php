@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.profilAhli.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.profil-ahlis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama_penuh">{{ trans('cruds.profilAhli.fields.nama_penuh') }}</label>
                <input class="form-control {{ $errors->has('nama_penuh') ? 'is-invalid' : '' }}" type="text" name="nama_penuh" id="nama_penuh" value="{{ old('nama_penuh', '') }}" required>
                @if($errors->has('nama_penuh'))
                    <span class="text-danger">{{ $errors->first('nama_penuh') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profilAhli.fields.nama_penuh_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_kad_pengenalan">{{ trans('cruds.profilAhli.fields.no_kad_pengenalan') }}</label>
                <input class="form-control {{ $errors->has('no_kad_pengenalan') ? 'is-invalid' : '' }}" type="text" name="no_kad_pengenalan" id="no_kad_pengenalan" value="{{ old('no_kad_pengenalan', '') }}" required>
                @if($errors->has('no_kad_pengenalan'))
                    <span class="text-danger">{{ $errors->first('no_kad_pengenalan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profilAhli.fields.no_kad_pengenalan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ictype_id">{{ trans('cruds.profilAhli.fields.ictype') }}</label>
                <select class="form-control select2 {{ $errors->has('ictype') ? 'is-invalid' : '' }}" name="ictype_id" id="ictype_id">
                    @foreach($ictypes as $id => $ictype)
                        <option value="{{ $id }}" {{ old('ictype_id') == $id ? 'selected' : '' }}>{{ $ictype }}</option>
                    @endforeach
                </select>
                @if($errors->has('ictype_id'))
                    <span class="text-danger">{{ $errors->first('ictype_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profilAhli.fields.ictype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jantina_id">{{ trans('cruds.profilAhli.fields.jantina') }}</label>
                <select class="form-control select2 {{ $errors->has('jantina') ? 'is-invalid' : '' }}" name="jantina_id" id="jantina_id">
                    @foreach($jantinas as $id => $jantina)
                        <option value="{{ $id }}" {{ old('jantina_id') == $id ? 'selected' : '' }}>{{ $jantina }}</option>
                    @endforeach
                </select>
                @if($errors->has('jantina_id'))
                    <span class="text-danger">{{ $errors->first('jantina_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profilAhli.fields.jantina_helper') }}</span>
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