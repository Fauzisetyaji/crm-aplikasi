@extends('layouts.app')

@section('title', 'Create Reward')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('reward.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('reward.store') }}" method="post" class="form-horizontal">
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

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="status_reward" {{ old('status_reward') === 'on' ? 'checked' : '' }} required> Status
                        </label>
                      </div>
                    </div>
                  </div>

                <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                    <label for="service" class="col-md-2 control-label">service</label>
                    <div class="col-md-4">
                        <select
                            name="service" value="{{ old('service') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih service</option>

                            @foreach($services as $key => $item)
                                <option {{ old('service') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nm_service }}</option>
                            @endforeach
                        </select>
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