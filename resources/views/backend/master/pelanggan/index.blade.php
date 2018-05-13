@extends('layouts.app')

@section('title', 'Master Pelanggan')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            @yield('title')
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Pelanggan</th>
                        <th>Nama</th>
                        <th>ID Pelanggan</th>
                        <th>Alamat</th>
                        <th>No.Telp</th>
                        <th>Poin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ ($item->kode_pelanggan) ? $item->kode_pelanggan : '-' }}</td>
                        <td>{{ $item->nm_pelanggan }}</td>
                        <td>{{ ($item->id_number) ? $item->id_number : '-' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_tlp }}</td>
                        <td>{{ $item->jml_poin }}</td>
                        <td>
                            <a href="{{ route('pelanggan.destroy', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display: none;">
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