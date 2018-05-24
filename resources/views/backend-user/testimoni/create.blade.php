@extends('layouts.app')

@section('title', 'Entry Testimoni')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('my-testimoni.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('my-testimoni.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                    <label for="detail" class="col-md-2 control-label">Isi Testimoni</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="detail" required>{{ old('detail') }}</textarea>
                    </div>
                </div>

                <input type="hidden" name="id_schedule" id="id-schedule" value="">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('my-testimoni.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection