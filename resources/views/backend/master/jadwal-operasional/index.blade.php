@extends('layouts.app')

@section('title', 'View Jadwal Operasional')

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
            <div class="pull-right"><a href="{{ route('operasional.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Tambah Jadwal Operasional Baru</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Mekanik</th>
                        <th>Jadwal</th>
                        <th>Mulai dari</th>
                        <th>Sampai dengan</th>
                        <th>Buka Tutup</th>
                        <th>Perulangan Hari</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->service->nm_service }}</td>
                        <td>{{ $item->mekanik->nm_mekanik }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->starts_on }}</td>
                        <td>{{ $item->ends_on }}</td>
                        <td>{{ date('h:i:s', strtotime($item->open_on)) .' - '. date('h:i:s', strtotime($item->close_on)) }}</td>
                        <td>{{ $item->length_in_days }}</td>
                        
                        <td>
                            <a href="{{ route('operasional.edit', $item->id) }}" title="Ubah">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="{{ route('operasional.destroy', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('operasional.destroy', $item->id) }}" method="POST" style="display: none;">
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