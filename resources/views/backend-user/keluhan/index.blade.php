@extends('layouts.app')

@section('title', 'View Keluhan')

@section('content')
<div class="col-md-9">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            @yield('title')
            <div class="pull-right"><a href="{{ route('my-keluhan.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Buat Keluhan</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Isi Keluhan</th>
                        <th>Tanggapan</th>
                        <th>Staff</th>
                        <th>Waktu dibuat</th>
                        <th>Waktu ditanggapi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->detail }}</td>
                        <td>{{ ($item->tanggapan) ? $item->tanggapan : 'Belum di tanggapi' }}</td>
                        <td>{{ isset($item->staff) ? $item->staff->nm_staff : '-' }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ isset($item->tanggapan) ? $item->updated_at : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection