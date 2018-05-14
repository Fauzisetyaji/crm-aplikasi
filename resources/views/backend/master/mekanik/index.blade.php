@extends('layouts.app')

@section('title', 'View Mekanik')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            @yield('title')
            <div class="pull-right"><a href="{{ route('mekanik.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Tambah Mekanik Baru</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No.Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nm_mekanik }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_tlp }}</td>
                        <td>
                            <a href="{{ route('mekanik.edit', $item->id) }}" title="Ubah">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('mekanik.destroy', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('mekanik.destroy', $item->id) }}" method="POST" style="display: none;">
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