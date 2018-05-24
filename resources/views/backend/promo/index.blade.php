@extends('layouts.app')

@section('title', 'View Promo Pelanggan')

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
            <div class="pull-right"><a href="{{ route('promo.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Tambah Promo Baru</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Promo</th>
                        <th>Service</th>
                        <th>Pelanggan</th>
                        <th>Periode</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nm_promo }}</td>
                        <td>
                            <a href="{{ route('service.show', $item->service->id) }}">
                                {{ $item->service->nm_service }}
                            </a>
                        </td>
                        <td>{{ $item->pelanggan->nm_pelanggan }}</td>
                        <td>{{ $item->starts_on . ' || ' . $item->ends_on }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('promo.edit', $item->id) }}" title="Ubah">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('promo.destroy', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('promo.destroy', $item->id) }}" method="POST" style="display: none;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection