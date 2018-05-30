@extends('layouts.app')

@section('title', 'History Service')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            @yield('title')
            <div class="pull-right"><a href="{{ route('my-booking.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Tambah Booking Baru</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No SPP</th>
                        <th>Tgl SPP</th>
                        <th>Jenis Pelayanan</th>
                        <th>Suku Cadang</th>
                        <th>Keluhan</th>
                        <th>Saran Perbaikan</th>
                        <th>Mekanik</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr class="{{ ($item->cancellation) ? 'danger' : ($item->status ? 'info' : '') }}" title="{{ ($item->cancellation) ? 'Dibatalkan' : '' }}">
                        <td scope="row">{{ str_pad($key + count($list), 7, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <a href="{{ route('my-booking.show', $item->id) }}">{{ date('d-m-Y', strtotime($item->date)) }}</a>
                        </td>
                        <td>{{ $item->jenis_service }}</td>
                        <td>-</td>
                        <td>{!! strip_tags(str_limit($item->keterangan, 80)) !!}</td>
                        <td>{{ isset($saran[$key]) ? $saran[$key] : (isset($saran[0]) ? $saran[0] : '-') }}</td>
                        <td>{{ isset($mekaniks[$key]) ? $mekaniks[$key]->nm_mekanik : (isset($mekaniks[0]) ? $mekaniks[0]->nm_mekanik : '-') }}</td>
                        <td>
                            @if (($item->status AND !$item->cancellation) AND !$item->cancellation)
                                <a href="{{ route('my-history.cetak', $item->id) }}" title="Cetak"
                                   style="color: grey; margin-left: 15px;">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection