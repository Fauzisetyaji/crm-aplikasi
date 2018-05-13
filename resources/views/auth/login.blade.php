@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-2">
                                @if($errors->all())
                                     @foreach ($errors->all() as $error)
                                        <span class="help-block">
                                            <li>{{ $error }}</li>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            <label for="userid" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="userid" type="text" class="form-control" name="userid" value="{{ old('userid') }}" required autofocus>

                                @if ($errors->has('userid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
