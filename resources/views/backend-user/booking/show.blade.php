@extends('layouts.app')

@section('title', 'Detail Booking')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default" style="margin-bottom: 50px;">
        <ol class="breadcrumb">
            <li><a href="{{ route('my-booking.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-heading">Data Booking</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>No. Polisi</th>
                        <th>Status</th>
                        <th>Jenis Pelayanan</th>
                        <th>Easy Service</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $booking->id }}</th>
                        <td>{{ date('d-m-Y', strtotime($booking->date)) }}</td>
                        <td>{{ date('h:i:s', strtotime($booking->time)) }}</td>
                        <td>{{ $booking->no_polisi }}</td>
                        <td>{{ ($booking->status) ? 'Diterima' : ($booking->cancellation ? 'Ditolak' : 'Menuggu') }}</td>
                        <td>{{ $booking->jenis_service }}</td>
                        <td>
                            @if($booking->easyService === 'send') Pick-Up My Car
                            @elseif($booking->easyService === 'pickup') Send-Up My Car
                            @elseif($booking->easyService === 'both') Pick-Up & Send-Up My Car
                            @elseif($booking->easyService === 'self') Selfe Service
                            @endif
                        </td>

                        <td>{!! strip_tags(str_limit($booking->keterangan, 80)) !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="panel-heading">Data Service</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Poin</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $key => $service)
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td>{{ $service->nm_service }}</td>
                        <td>{{ $service->jenis_service }}</td>
                        <td>{{ $service->poin }}</td>
                        <td>{!! strip_tags(str_limit($service->description, 80)) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="panel-heading">Data Pelanggan</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nama</th>
                        <th>NPWP</th>
                        <th>Alamat</th>
                        <th>No.Telp</th>
                        <th>Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelanggans as $key => $pelanggan)
                    <tr>
                        <th scope="row">{{ $pelanggan->id }}</th>
                        <td>{{ $pelanggan->nm_pelanggan }}</td>
                        <td>{{ ($pelanggan->id_number) ? $pelanggan->id_number : '-' }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->no_tlp }}</td>
                        <td>{{ $pelanggan->jml_poin }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h4>Operasional aktivitas di tahun terkahir</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <button id="minDate-previous" style="margin-bottom: 10px;" class="btn"><i class="fa fa-arrow-circle-o-left"></i></button>
                    <button id="minDate-next" style="margin-bottom: 10px;" class="btn"><i class="fa fa-arrow-circle-o-right"></i></button>

                    <hr>
                    <div id="cal-heatmap"></div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scriptsHead')
<script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
@endsection

@section('scripts')
<style type="text/css">
.cal-heatmap-container rect.highlight {
    stroke: red;
    stroke-width: 2;
}

.cal-heatmap-container rect.now {
    stroke: #444;
    stroke-width: 2;
}

.cal-heatmap-container text.now {
    fill: #444;
    font-weight: 600;
}

</style>>
<script type="text/javascript">
    var cal = new CalHeatMap();
    var currentDate = new Date();
    var booking = {!! $booking !!}
    currentDate.setDate(currentDate.getDate() + 1);
    var scheduleHighlight = [];
    scheduleHighlight.push(new Date(booking.date));

    cal.init({
        itemSelector: "#cal-heatmap",
        domain: "month",
        subDomain: "x_day",
        cellSize: 27,
        cellPadding: 5,
        rowLimit: 7,
        itemName: ["book", "booked"],
        subDomainTextFormat: "%d",
        subDomainTitleFormat : {
            empty: "No data on {date}",
            filled: "{count} {name} {connector} {date}"
        },
        domainLabelFormat: "%B %Y",
        range: 4,
        domainGutter: 20,
        legend: [1, 2, 4 ,8],
        legendCellSize: 20,
        displayLegend: false,
        tooltip: true,
        highlight: scheduleHighlight,
        start: currentDate,
    });

    $("#minDate-previous").on("click", function(e) {
        e.preventDefault();
        if (!cal.previous()) {
            alert("No more domains to load");
        }
    });

    $("#minDate-next").on("click", function(e) {
        e.preventDefault();
        if (!cal.next()) {
            alert("No more domains to load");
        }
    });
</script>
@endsection
