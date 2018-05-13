@extends('layouts.app')

@section('title', 'Detail Service')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default" style="margin-bottom: 50px;">
        <ol class="breadcrumb">
            <li><a href="{{ route('service.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $service->id }}</th>
                        <td>{{ $service->nm_service }}</td>
                        <td>{{ $service->jenis_service }}</td>
                        <td>{!! strip_tags(str_limit($service->description, 80)) !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @if( !count($service->operasionals) > 0 )
        <div class="panel panel-default" style="margin-bottom: 50px;">
            <ol class="breadcrumb">
                <li class="active">Operasional</li>
            </ol>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Tanggal</th>
                            <th>Mekanik</th>
                            <th>Buka Jam</th>
                            <th>Tutup Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{ $service->id }}</th>
                            <td>{{ $service->nm_service }}</td>
                            <td>{{ $service->jenis_service }}</td>
                            <td>{{ $service->jenis_service }}</td>
                            <td>{{ $service->jenis_service }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif

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
    stroke: #444;
    stroke-width: 1;
}

.cal-heatmap-container rect.now {
    stroke: red;
    stroke-width: 2;
}

.cal-heatmap-container text.now {
    fill: white;
    font-weight: 600;
}

</style>>
<script type="text/javascript">
    var cal = new CalHeatMap();
    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);

    var datas = [
        {date: 1525972255, value: 3},
        {date: 1526058655, value: 7},
        {date: 1526404255, value: 1},
        {date: 1526749855, value: 8},
    ]

    var parser = function(data) {
        var stats = {};
        for (var d in data) {
            stats[data[d].date] = data[d].value;
        }
        // console.log(stats)
        return stats;
    };

    var afterLoadData = function (timestamps) {
        var offset = new Date().getTimezoneOffset() * 60;
        var results = {};
        for (var timestamp in timestamps) {
            var commitCount = timestamps[timestamp]
            timestamp = parseInt(timestamp, 10)
            // results[timestamp + offset] = commitCount
            results[timestamps[timestamp].date] = timestamps[timestamp].value
            // console.log(timestamps[timestamp])
        };
        return results
    };

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
        tooltip: true,
        highlight: ["now"],
        data: datas,
        afterLoadData: afterLoadData,
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

