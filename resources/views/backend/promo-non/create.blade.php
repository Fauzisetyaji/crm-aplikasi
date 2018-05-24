@extends('layouts.app')

@section('title', 'Entry Promo Non Pelanggan')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('promo-non-pelanggan.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('promo-non-pelanggan.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_promo') ? ' has-error' : '' }}">
                    <label for="nm_promo" class="col-md-2 control-label">Promo</label>
                    <div class="col-md-4">
                        <input type="text" name="nm_promo" class="form-control" value="{{ old('nm_promo') }}" required>
                        @if ($errors->has('nm_promo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_promo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('starts_on') ? ' has-error' : '' }}">
                    <label for="starts_on" class="col-md-2 control-label">Periode</label>
                    <div class="col-md-4">
                        <input type="text" name="starts_on" class="form-control starts_on" value="{{ old('starts_on') }}" required>
                        @if ($errors->has('starts_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('starts_on') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="ends_on" class="form-control ends_on" value="{{ old('ends_on') }}" required>
                        @if ($errors->has('ends_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ends_on') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                    <label for="keterangan" class="col-md-2 control-label">Ketrangan</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="keterangan" required>{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <br>
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('promo-non-pelanggan.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.starts_on, .ends_on').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            minDate: moment()
        });

        $('.starts_on').datetimepicker()
        .on('dp.change', function(v){ 
            var incrementDay = moment(new Date(v.date));
            incrementDay.add(1, 'days');
            $('.ends_on').data('DateTimePicker').minDate(incrementDay);
            $(this).data("DateTimePicker").hide();
        });

        $('.ends_on').datetimepicker()
        .on('dp.change', function(v){
            var decrementDay = moment(new Date(v.date));
            decrementDay.subtract(1, 'days');
            $('.starts_on').data('DateTimePicker').maxDate(decrementDay);
            $(this).data("DateTimePicker").hide();
        });
    });
</script>
@endsection