@extends('layouts.app')

@section('title', 'Entry Service')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('service.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('service.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_service') ? ' has-error' : '' }}">
                    <label for="nm_service" class="col-md-2 control-label">Nama Service</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_service" class="form-control" value="{{ old('nm_service') }}" required>
                        @if ($errors->has('nm_service'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_service') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('jenis_service') ? ' has-error' : '' }}">
                    <label for="jenis_service" class="col-md-2 control-label">Jenis Service</label>
                    <div class="col-md-4">
                        <select
                            name="jenis_service" value="{{ old('jenis_service') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih service</option>
                            <option value="ringan">Ringan</option>
                            <option value="berat">Berat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-2 control-label">Detail Service</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="description" required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('poin') ? ' has-error' : '' }}">
                    <label for="poin" class="col-md-2 control-label">Poin</label>
                    <div class="col-md-8">
                        <input type="text" name="poin" class="form-control" value="{{ old('poin') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('service.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection