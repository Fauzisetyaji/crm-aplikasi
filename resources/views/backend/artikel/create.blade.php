@extends('layouts.app')

@section('title', 'Entry Artikel')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('artikel.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('artikel.store') }}" method="post" class="form-horizontal"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                    <label for="judul" class="col-md-2 control-label">Judul</label>
                    <div class="col-md-4">
                        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        @if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                    <label for="gambar" class="col-md-2 control-label">Gambar</label>
                    <div class="col-md-4">
                        <input type="file"
                            accept="image/*"
                            name="gambar"
                            class="form-control"
                            value="{{ old('gambar') }}"
                            required>
                        @if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('konten') ? ' has-error' : '' }}">
                    <label for="konten" class="col-md-2 control-label">Isi Artikel</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="konten">{{ old('konten') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('artikel.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection