@extends('layouts.app')

@section('title', 'Pilih Periode')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route(Request::route()->getName()) }}" method="get" class="form-horizontal"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('periode') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 col-md-offset-3 control-label"> Pilih Tahun Periode</label>
                    <div class="col-md-3">
                        <input type="text" name="periode" class="form-control periode" value="{{ old('periode') }}" placeholder="dd-mm-yyyy">
                        @if ($errors->has('periode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('periode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" name="return" value="pdf">

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-5">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-danger">Hapus</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
        var d = new Date();
        d.setDate(d.getDate());

    $(document).ready(function(){

        $('.periode').datetimepicker({
            format: 'YYYY',
            useCurrent: false,
            defaultDate: d
        });
    });
</script>
@endsection