@extends('layouts.app')

@section('title', 'Edit Operasional')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('operasional.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('operasional.update', $operasional->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nama</label>
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $operasional->name) }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('starts_on') ? ' has-error' : '' }}">
                    <label for="starts_on" class="col-md-2 control-label">Tanggal mulai</label>
                    <div class="col-md-6">
                        <input type="text" name="starts_on" class="form-control starts_on" value="{{ old('starts_on', $operasional->starts_on) }}" required>
                        @if ($errors->has('starts_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('starts_on') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ends_on') ? ' has-error' : '' }}">
                    <label for="ends_on" class="col-md-2 control-label">Tanggal berakhir</label>
                    <div class="col-md-6">
                        <input type="text" name="ends_on" class="form-control ends_on" value="{{ old('ends_on', $operasional->ends_on) }}" required>
                        @if ($errors->has('ends_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ends_on') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('open_on') ? ' has-error' : '' }}">
                    <label for="open_on" class="col-md-2 control-label">Jam buka</label>
                    <div class="col-md-6">
                        <input type="text" name="open_on" class="form-control open_on" value="{{ old('open_on') }}" required>
                        @if ($errors->has('open_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('open_on') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('close_on') ? ' has-error' : '' }}">
                    <label for="close_on" class="col-md-2 control-label">Jam tutup</label>
                    <div class="col-md-6">
                        <input type="text" name="close_on" class="form-control close_on" value="{{ old('close_on') }}" required>
                        @if ($errors->has('close_on'))
                            <span class="help-block">
                                <strong>{{ $errors->first('close_on') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('operasional.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var diffDays = {!! $diffDates !!};

        $('.starts_on, .ends_on').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            minDate: moment()// moment().add(diffDays, 'days')
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

        $('.open_on, .close_on').datetimepicker({
            format: 'LT',
            sideBySide: true,
        });
    });
</script>
@endsection