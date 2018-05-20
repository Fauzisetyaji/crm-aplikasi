@extends('layouts.app')

@section('title', 'Entry Reward')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('reward.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('reward.store') }}" method="post" class="form-horizontal"
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('nm_reward') ? ' has-error' : '' }}">
                    <label for="nm_reward" class="col-md-2 control-label">Reward</label>
                    <div class="col-md-4">
                        <input type="text" name="nm_reward" class="form-control" value="{{ old('nm_reward') }}" required>
                        @if ($errors->has('nm_reward'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_reward') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('poin') ? ' has-error' : '' }}">
                    <label for="poin" class="col-md-2 control-label">Poin</label>
                    <div class="col-md-4">
                        <input type="text" name="poin" class="form-control" value="{{ old('poin') }}" required>
                        @if ($errors->has('poin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('poin') }}</strong>
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

                <div class="form-group{{ $errors->has('count') ? ' has-error' : '' }}">
                    <label for="count" class="col-md-2 control-label">Jumlah</label>
                    <div class="col-md-4">
                        <input type="number" name="count" class="form-control" value="{{ old('count') }}" required>
                        @if ($errors->has('count'))
                            <span class="help-block">
                                <strong>{{ $errors->first('count') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label for="date" class="col-md-2 control-label">Tanggal berakhir</label>
                    <div class="col-md-6">
                        <input type="text" name="date" class="form-control date" value="{{ old('date') }}" required>
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('reward.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.date').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false,
            minDate: moment()// moment().add(diffDays, 'days')
        });
    });
</script>
@endsection