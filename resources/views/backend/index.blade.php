@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-6">
                <h5>Top Service</h5>
                <canvas id="radarChartService" width="200" height="200"></canvas>
            </div>

            <div class="col-md-6">
                <h5>Top Pelanggan</h5>
                <canvas id="radarChartPelanggan" width="200" height="200"></canvas>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var ctxRadarService = document.getElementById("radarChartService");
    var ctxRadarPelanggan = document.getElementById("radarChartPelanggan");
    var services = {!! $services !!}
    var lblServices = [];
    if (services.length > 0) {
        services.forEach((item) => {
            lblServices.push(item.nm_service)
        })
    }

    var marksDataRadar = {
        labels: lblServices,
        datasets: [{
            label: "Non-Booking",
            backgroundColor: "rgba(200,0,0,0.2)",
            data: [65, 75, 70, 80, 60, 80, 30]
        }, {
            label: "Booking",
            backgroundColor: "rgba(0,0,200,0.2)",
            data: [54, 65, 60, 70, 70, 75, 95]
        }]
    };

    var radarChart = new Chart(ctxRadarService, {
        type: 'radar',
        data: marksDataRadar
    });

    var radarChart = new Chart(ctxRadarPelanggan, {
        type: 'radar',
        data: marksDataRadar
    });
</script>
@endsection