@extends('layouts.app')

@section('title', 'My Booking')

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
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Jenis Service</th>
                        <th>Easy Service</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr class="{{ ($item->cancellation) ? 'danger' : '' }}" title="{{ ($item->cancellation) ? 'Dibatalkan' : '' }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <a href="{{ route('my-booking.show', $item->id) }}">{{ date('d-m-Y', strtotime($item->date)) }}</a>
                        </td>
                        <td>{{ date('h:i:s', strtotime($item->time)) }}</td>
                        <td>{{ ($item->status) ? 'Diterima' : ($item->cancellation ? 'Ditolak' : 'Menuggu') }}</td>
                        <td>{{ $item->jenis_service }}</td>
                        <td>{{ $item->easyService }}</td>
                        <td>{!! strip_tags(str_limit($item->keterangan, 80)) !!}</td>
                        <td>
                            @if (!$item->cancellation)
                                <a href="{{ route('my-booking.edit', $item->id) }}" title="Ubah">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('my-booking.cancel', $item->id) }}" title="Batalkan"
                                   onclick="event.preventDefault(); document.getElementById('cancel-form-{{$item->id}}').submit();"
                                   style="color: red; margin-left: 15px;">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <form id="cancel-form-{{$item->id}}" action="{{ route('my-booking.cancel', $item->id ) }}" method="post" style="display: none;">
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