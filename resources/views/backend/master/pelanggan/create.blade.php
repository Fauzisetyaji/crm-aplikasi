@extends('layouts.app')

@section('title', 'Master Create Staff')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('staff.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('staff.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_staff') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nama Staff</label>
                    <div class="col-md-8">
                        <input type="text" name="nm_staff" class="form-control" value="{{ old('nm_staff') }}">
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
                        <input type="text" name="tgl_lahir" class="form-control tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="dd-mm-yyyy">
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
                        <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                    <label for="no_telp" class="col-md-2 control-label">No. Telp</label>
                    <div class="col-md-8">
                        <input type="text" name="no_tlp" value="{{ old('no_tlp') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('staff.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
        var d = new Date(1999);
        d.setDate(d.getDate());

    $(document).ready(function(){

        $('.tgl_lahir').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            // minDate: moment(),
            defaultDate: d
        });
    });
</script>
@endsection