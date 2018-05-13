@extends('layouts.app')

@section('title', 'Testimoni')

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
                        <th>Detail</th>
                        <th>User</th>
                        <th>Waktu dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->detail }}</td>
                        <td>{{ $item->pelanggan }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('testimoni.destroy', $item->id) }}" title="Hapus"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                               style="color: red; margin-left: 15px;">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('testimoni.destroy', $item->id) }}" method="POST" style="display: none;">
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