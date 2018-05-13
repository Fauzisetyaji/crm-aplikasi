@extends('layouts.app')

@section('title', 'Detail Operasional')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default" style="margin-bottom: 50px;">
        <ol class="breadcrumb">
            <li><a href="{{ route('operasional.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nama</th>
                        <th>Mulai dari</th>
                        <th>Sampai dengan</th>
                        <th>Buka Tutup</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $operasional->id }}</th>
                        <td>{{ $operasional->name }}</td>
                        <td>{{ $operasional->starts_on }}</td>
                        <td>{{ $operasional->ends_on }}</td>
                        <td>{{ date('h:i:s', strtotime($operasional->open_on)) .' - '. date('h:i:s', strtotime($operasional->close_on)) }}</td>
                    </tr>
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
    stroke-width: 1;
}

.cal-heatmap-container rect.now {
    stroke: white;
    stroke-width: 2;
}

.cal-heatmap-container text.now {
    fill: white;
    font-weight: 600;
}

</style>
<script type="text/javascript">
    var jadwalOperasional = {!! $jadwalOperasional !!}
    var cal = new CalHeatMap();
    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    var scheduleHighlight = [];
    var bookData = [];

    if (jadwalOperasional.length > 0) {
        jadwalOperasional.forEach((item) => {
            scheduleHighlight.push(new Date(item.date))

            if (item.service_count) {

            }

            if (item.booking_count) {
                bookData.push({date: Math.round(new Date(item.date).getTime()/1000), value: item.booking_count})
            }
        })
    }

    // example data
    var datas = [
        {date: 1525972255, value: 3},
        {date: 1526058655, value: 7},
        {date: 1526404255, value: 1},
        {date: 1526749855, value: 2},
    ]

    var parser = function(data) {
        var stats = {};
        for (var d in data) {
            stats[data[d].date] = data[d].value;
        }
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
            empty: "No activity on {date}",
            filled: "{count} {name} {connector} {date}"
        },
        domainLabelFormat: "%B %Y",
        range: 4,
        domainGutter: 20,
        legend: [1, 2, 4 ,8],
        legendCellSize: 20,
        tooltip: true,
        highlight: scheduleHighlight,
        data: bookData,
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

