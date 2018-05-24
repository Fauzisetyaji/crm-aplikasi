@extends('layouts.app')

@section('title', 'Entry Mekanik')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('mekanik.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('mekanik.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_mekanik') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nama Mekanik</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_mekanik" class="form-control" value="{{ old('nm_mekanik') }}" required>
                        @if ($errors->has('nm_mekanik'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_mekanik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="alamat" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="alamat" required>{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                    <label for="no_telp" class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                        <input type="text" name="no_tlp" value="{{ old('no_tlp') }}" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('mekanik.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection