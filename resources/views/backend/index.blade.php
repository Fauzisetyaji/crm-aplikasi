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

            @if(Auth::user()->roles === 'staff')
                <div class="col-md-9">
                    <h5>Pelanggan Baru</h5>
                    <canvas id="lineChartPelanggan" width="200" height="200"></canvas>
                </div>

                <div class="col-md-6">
                    <h5>Booking Service</h5>
                    <canvas id="barChartBooking" width="200" height="200"></canvas>
                </div>

                <div class="col-md-6">
                    <h5>Top Poin</h5>
                    <canvas id="radarChartPoin" width="200" height="200"></canvas>
                </div>

                <div class="col-md-6">
                    <h5>Top Pelanggan</h5>
                    <canvas id="barChartPelanggan" width="200" height="200"></canvas>
                </div>

                <div class="col-md-6">
                    <h5>Top Service</h5>
                    <canvas id="pieChartService" width="200" height="200"></canvas>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var ctxLinePelanggan = document.getElementById("lineChartPelanggan");
    var ctxRadarPoin = document.getElementById("radarChartPoin");
    var ctxBarPelanggan = document.getElementById("barChartPelanggan");
    var ctxBarBooking = document.getElementById("barChartBooking");
    var ctxPieService = document.getElementById("pieChartService");
    var services = {!! $services !!}
    var pelanggans = {!! $pelanggans !!}
    var lblServices = [];
    var lblPelanggan = [];
    if (services.length > 0) {
        services.forEach((item) => {
            lblServices.push(item.nm_service)
        })
    }

    if (pelanggans.length > 0) {
        pelanggans.forEach((item) => {
            lblPelanggan.push(item.nm_pelanggan)
        })
    }

    var marksDataRadar = {
        labels: lblServices,
        datasets: [{
            label: "Booking",
            backgroundColor: "rgba(0,0,200,0.2)",
            data: [54, 65, 60, 70, 70, 75, 95]
        }]
    };

    var marksDataRadarPelanggan = {
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



    var radarChart = new Chart(ctxRadarPoin, {
        type: 'radar',
        data: marksDataRadar
    });

    var lineChart = new Chart(ctxLinePelanggan, {
        type: 'line',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [
            {
                label: '#Tahun 2018',
                data: [12, 15, 3, 5, 8, 3, 12, 16, 10, 5, 6, 3],
                borderWidth: 1
            },  
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        reverse: false
                    }
                }]
            }
        }
    });
    
    var barChart = new Chart(ctxBarPelanggan, {
        type: 'bar',
        data: {
            labels: lblPelanggan,
            datasets: [{
                label: 'Pelanggan',
                data: [4, 7, 3, 5, 8, 3 ,10, 4]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        offsetGridLines: true
                    }
                }]
            }
        }
    });

    var barChart = new Chart(ctxBarBooking, {
        type: 'bar',
        data: {
            labels: lblServices,
            datasets: [{
                label: 'Booking',
                data: [12, 19, 3, 5, 8, 3 ,10]
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        offsetGridLines: true
                    }
                }]
            }
        }
    });

    var myChart = new Chart(ctxPieService, {
        type: 'pie',
        data: {
            labels: lblServices,
            datasets: [{
                backgroundColor: [
                    "#2ecc71",
                    "#3498db",
                    "#95a5a6",
                    "#9b59b6",
                    "#f1c40f",
                    "#e74c3c",
                    "#34495e"
                ],
                data: [12, 19, 3, 17, 28, 24, 7]
            }]
        }
    });
</script>
@endsection