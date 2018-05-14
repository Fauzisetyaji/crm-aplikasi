@extends('layouts.app')

@section('title', 'View Operasional')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            @yield('title')
            <div class="pull-right"><a href="{{ route('operasional.create') }}" class="btn btn-info" style="margin-top: -7px;" role="button">Tambah Operasional Baru</a></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Mulai dari</th>
                        <th>Sampai dengan</th>
                        <th>Buka Tutup</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="{{ route('operasional.show', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->starts_on }}</td>
                        <td>{{ ($item->ends_on) ? $item->ends_on : '-' }}</td>
                        <td>{{ date('h:i:s', strtotime($item->open_on)) .' - '. date('h:i:s', strtotime($item->close_on)) }}</td>
                        <td>
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


    <h4>Periode Aktivitas booking service</h4>
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
    stroke: red;
    stroke-width: 1;
}

/*.cal-heatmap-container text.now {
    fill: white;
    font-weight: 600;
}*/

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
            console.log(item.date)
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