@extends('layouts.app')

@section('title', 'My Poin')

@section('content')
<div class="col-md-3 col-xl-3">
    <div class="card">
        <div class="card-body">
            <div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-database" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="numbers"><p>My Poin</p>
                            {{ $user->pelanggan->jml_poin }}
                        </div>
                    </div>
                </div>
                <div>
                    <hr>
                    <div class="stats">
                        <i class="ti-reload"></i> Updated now
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            My History Reward
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Reward</th>
                        <th>Potongan Poin</th>
                        <th>Gambar</th>
                        <th>Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($claims as $key => $item)
                    <tr
                    class="{{ ($item->count > 0) ? ' ' : ($item->count === '0' ? 'danger' : ' ') }}" title="{{ ($item->count === '0') ? 'Soldout' : '' }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->reward->nm_reward }}</td>
                        <td>{{ $item->reward->poin }}</td>
                        <td>
                            <div class="cell">
                                <img src="{{ asset('storage/images/'.$item->reward->gambar) }}" style="width: 50px;">
                            </div>
                        </td>
                        <td>{{ $item->reward->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-md-9 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            Reward
            @if($errors->first('claim'))
                <div class="alert alert-warning" role="alert">{{ $errors->first('claim') }}</div>
            @endif
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Reward</th>
                        <th>Poin</th>
                        <th>Gambar</th>
                        <th>Berlaku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewards as $key => $item)
                    <tr
                    class="{{ ($item->count > 0) ? ' ' : ($item->count === '0' ? 'danger' : ' ') }}" title="{{ ($item->count === '0') ? 'Soldout' : '' }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nm_reward }}</td>
                        <td>{{ $item->poin }}</td>
                        <td>
                            <div class="cell">
                                <img src="{{ asset('storage/images/'.$item->gambar) }}" style="width: 50px;">
                            </div>
                        </td>
                        <td>{{ $item->date }}</td>
                        <td>
                            @if($item->count !== '0')
                                <a href="{{ route('reward.claim', $item->id) }}" title="Batalkan"
                                   onclick="event.preventDefault(); document.getElementById('claim-form-{{$item->id}}').submit();"
                                   class="btn btn-info" role="button">
                                   Claim
                                </a>
                                <form id="claim-form-{{$item->id}}" action="{{ route('reward.claim', $item->id ) }}" method="post" style="display: none;">
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