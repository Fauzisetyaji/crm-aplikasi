@extends('layouts.app')

@section('title', 'Entry Keluhan')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('my-keluhan.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('keluhan.update', $keluhan->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                    <label for="detail" class="col-md-2 control-label">Isi keluhan</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="detail" required disabled>{{ old('detail', $keluhan->detail) }}</textarea>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tanggapan') ? ' has-error' : '' }}">
                    <label for="tanggapan" class="col-md-2 control-label">Isi Tanggapan</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="tanggapan" required>{{ old('tanggapan', $keluhan->tanggapan) }}</textarea>
                    </div>
                </div>

                <input type="hidden" name="id_schedule" id="id-schedule" value="">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('my-keluhan.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection