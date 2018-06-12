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
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Keluhan</th>
                        <th>User</th>
                        <th>Staff</th>
                        <th>Waktu dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            @if(is_null($item->tanggapan))
                                <a href="{{ route('keluhan.edit', $item->id) }}">
                                    {{ $item->detail }}
                                </a>
                            @else
                                {{ $item->detail }}
                            @endif
                        </td>
                        
                        
                        <td>{{ $item->pelanggan->nm_pelanggan }}</td>
                        <td>{{ isset($item->staff) ? $item->staff->nm_staff : '-' }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if(is_null($item->tanggapan))
                                <a href="{{ route('keluhan.destroy', $item->id) }}" title="Hapus"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                                   style="color: red; margin-left: 15px;">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <form id="delete-form-{{$item->id}}" action="{{ route('keluhan.destroy', $item->id) }}" method="POST" style="display: none;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
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