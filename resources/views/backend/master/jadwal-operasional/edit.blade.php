@extends('layouts.app')

@section('title', 'Master Edit Mekanik')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('mekanik.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('mekanik.update', $mekanik->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_mekanik') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nama Mekanik</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_mekanik" class="form-control" value="{{ old('nm_mekanik', $mekanik->nm_mekanik) }}" placeholder="X-50-X">
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
                        <textarea class="form-control" name="alamat">{{ old('alamat', $mekanik->alamat) }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                    <label for="no_telp" class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                        <input type="text" name="no_tlp" value="{{ old('no_tlp', $mekanik->no_tlp) }}" class="form-control" placeholder="X-12-X">
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('mekanik.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection