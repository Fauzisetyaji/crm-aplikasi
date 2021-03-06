@extends('layouts.app')

@section('title', 'View Booking')

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
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No. Booking</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>No. Polisi</th>
                        <th>Status</th>
                        <th>Jenis Pelayanan</th>
                        <th>Easy Service</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr class="{{ ($item->cancellation) ? 'danger' : ($item->status ? 'info' : '') }}" title="{{ ($item->cancellation) ? 'Dibatalkan' : '' }}">
                        <th scope="row">{{ $item->booking_number }}</th>
                        <td>
                            <a href="{{ route('booking.show', $item->id) }}">{{ date('d-m-Y', strtotime($item->date)) }}</a>
                        </td>
                        <td>{{ date('h:i:s', strtotime($item->time)) }}</td>
                        <td>{{ $item->no_polisi }}</td>
                        <td>{{ ($item->status) ? 'Diterima' : ($item->cancellation ? 'Ditolak' : 'Menuggu') }}</td>
                        <td>{{ $item->jenis_pelayanan }}</td>
                        <td>
                            @if($item->easyService === 'pickup') Pick-Up My Car
                            @elseif($item->easyService === 'send') Send-Up My Car
                            @elseif($item->easyService === 'both') Pick-Up & Send-Up My Car
                            @elseif($item->easyService === 'self') Selfe Service
                            @endif
                        </td>
                        <td>{!! strip_tags(str_limit($item->keterangan, 80)) !!}</td>
                        <td>
                            @if ((!$item->status AND !$item->cancellation) AND !$item->cancellation)
                                <a href="{{ route('booking.cancel', $item->id) }}" title="Batalkan"
                                   onclick="event.preventDefault(); document.getElementById('cancel-form-{{$item->id}}').submit();"
                                   style="color: red; margin-left: 15px;">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <form id="cancel-form-{{$item->id}}" action="{{ route('booking.cancel', $item->id ) }}" method="post" style="display: none;">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_booking" value="{{ $item->id }}">
                                </form>
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