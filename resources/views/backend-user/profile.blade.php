@extends('layouts.app')

@section('title', 'Ubah Profile')

@section('content')

<div class="col-md-5">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">@yield('title')</div>
        <div class="panel-body">
            <form role="form" action="{{ route('ubah-profile.update', $user->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="col-md-4 control-label">Username</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nm_pelanggan') ? ' has-error' : '' }}">
                    <label for="nm_pelanggan" class="col-md-4 control-label">Nama Anda</label>

                    <div class="col-md-6">
                        <input id="nm_pelanggan" type="text" class="form-control" name="nm_pelanggan" value="{{ old('nm_pelanggan', $user->pelanggan->nm_pelanggan) }}" required autofocus>

                        @if ($errors->has('nm_pelanggan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_pelanggan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
                    <label for="no_tlp" class="col-md-4 control-label">Nomor Telp.</label>

                    <div class="col-md-6">
                        <input id="no_tlp" type="text" class="form-control" name="no_tlp" value="{{ old('no_tlp', $user->pelanggan->no_tlp) }}" required autofocus>

                        @if ($errors->has('no_tlp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_tlp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('id_number') ? ' has-error' : '' }}">
                    <label for="id_number" class="col-md-4 control-label">NPWP</label>

                    <div class="col-md-6">
                        <input id="id_number" type="text" class="form-control" name="id_number" value="{{ old('id_number', $user->pelanggan->id_number) }}" required autofocus>

                        @if ($errors->has('id_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                    <label for="alamat" class="col-md-4 control-label">Alamat</label>

                    <div class="col-md-6">
                        <textarea id="alamat" type="text" class="form-control" name="alamat" required>{{ old('alamat', $user->pelanggan->alamat) }}</textarea>

                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Ubah Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    @if(session()->has('success-2'))
        <div class="alert alert-success">
            {{ session()->get('success-2') }}
        </div>
    @endif
    
    @if($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Ubah Password</div>
        <div class="panel-body">
            <form role="form" action="{{ route('ubah-profile.updatePassword', $user->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

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
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Ubah Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-4">
    @if(session()->has('success-3'))
        <div class="alert alert-success">
            {{ session()->get('success-3') }}
        </div>
    @endif
    @if($errors->has('no_polisi'))
        <div class="alert alert-danger">
            {{ $errors->first('no_polisi') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Nomor Kendaraan</div>
        <div class="panel-body">
            <form role="form" action="{{ route('ubah-profile.tambahNopol', $user->id) }}" method="post" class="form-horizontal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="no_polisi" class="col-md-4 control-label">Nomor Polisi</label>
                    <div class="col-md-6">
                        <input id="no_polisi" type="text" class="form-control" name="no_polisi" value="{{ old('no_polisi') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kendaraan" class="col-md-4 control-label">Kendaraan</label>
                    <div class="col-md-6">
                        <select
                            name="jenis_kendaraan" value="{{ old('jenis_kendaraan') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih type kendaraan</option>
                            <option value="Avanza">Avanza</option>
                            <option value="Agya">Agya</option>
                            <option value="Calya">Calya</option>
                            <option value="Rush">Rush</option>
                            <option value="Yaris">Yaris</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-9 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            Kendaraan Saya
            @if(session()->has('success-3'))
                <div class="alert alert-success">
                    {{ session()->get('success-3') }}
                </div>
            @endif
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Polisi</th>
                        <th>Jenis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($user->pelanggan->kendaraan)
                        @foreach($user->pelanggan->kendaraan as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->no_polisi }}</td>
                            <td>{{ $item->jenis_kendaraan }}</td>
                            <td>
                                <a href="{{ route('ubah-profile.deleteNopol', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <form id="delete-form-{{$item->id}}" action="{{ route('ubah-profile.deleteNopol', $item->id) }}" method="POST" style="display: none;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection