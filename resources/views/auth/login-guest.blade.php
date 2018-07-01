@extends('layouts.app')

@section('title', 'Login sebagai Tamu')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login sebagai Tamu</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register-guest') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_guest') ? ' has-error' : '' }}">
                            <label for="nama_guest" class="col-md-4 control-label">Nama Anda</label>

                            <div class="col-md-6">
                                <input id="nama_guest" type="text" class="form-control" name="nama_guest" value="{{ old('nama_guest') }}" required autofocus>

                                @if ($errors->has('nama_guest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_guest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
                            <label for="no_tlp" class="col-md-4 control-label">Nomor Telp.</label>

                            <div class="col-md-6">
                                <input id="no_tlp" type="text" class="form-control" name="no_tlp" value="{{ old('no_tlp') }}" required autofocus>

                                @if ($errors->has('no_tlp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_tlp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <textarea id="alamat" type="text" class="form-control" name="alamat" required>
                                    {{ old('alamat') }}
                                </textarea>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nopol') ? ' has-error' : '' }}">
                            <label for="nopol" class="col-md-4 control-label">Nomor Polisi</label>

                            <div class="col-md-6">
                                <input id="nopol" type="text" class="form-control" name="nopol" value="{{ old('nopol') }}" required autofocus>

                                @if ($errors->has('nopol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nopol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type_kendaraan') ? ' has-error' : '' }}">
                            <label for="type_kendaraan" class="col-md-4 control-label">type Kendaraan</label>

                            <div class="col-md-6">
                                <select
                                    name="type_kendaraan" value="{{ old('type_kendaraan') }}" class="form-control" required>
                                    <option value="" disabled selected>Pilih type kendaraan</option>
                                    <option value="Avanza">Avanza</option>
                                    <option value="Agya">Agya</option>
                                    <option value="Calya">Calya</option>
                                    <option value="Rush">Rush</option>
                                    <option value="Yaris">Yaris</option>
                                </select>

                                @if ($errors->has('type_kendaraan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_kendaraan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
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
