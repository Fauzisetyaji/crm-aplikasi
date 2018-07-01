@extends('layouts.app')

@section('title', 'Dashboard Tamu')

@section('content')
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        @if($errors->first('claim'))
            <div class="alert alert-warning" role="alert">{{ $errors->first('claim') }}</div>
        @endif
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            Selamat datang dihalaman dashboard untuk Tamu.
        </div>
    </div>
</div>
@endsection