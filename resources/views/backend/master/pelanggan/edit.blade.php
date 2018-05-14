@extends('layouts.app')

@section('title', 'Edit Staff')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('staff.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('staff.update', $staff->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_staff') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nama Staff</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_staff" class="form-control" value="{{ old('nm_staff', $staff->nm_staff) }}" placeholder="X-50-X">
                        @if ($errors->has('nm_staff'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_staff') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Tanggal Lahir</label>
                    <div class="col-md-8">
                        <input type="text" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', date('d-m-Y', strtotime($staff->tgl_lahir))) }}" placeholder="dd-mm-yyyy">
                        @if ($errors->has('tgl_lahir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_lahir') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="alamat" class="col-md-2 control-label">Alamat</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="alamat">{{ old('alamat', $staff->alamat) }}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                    <label for="no_telp" class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                        <input type="text" name="no_tlp" value="{{ old('no_tlp', $staff->no_tlp) }}" class="form-control" placeholder="X-12-X">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" value="{{ old('email', $staff->user->email) }}" class="form-control" placeholder="Email" disabled>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('staff.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection