@extends('layouts.app')

@section('title', 'Booking Service Tamu')

@section('content')
<div class="col-md-9">
    <h4>Selamat Datang, untuk melakukan booking silahkan pilih tanggal terlebih dahulu.</h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <button id="minDate-previous" style="margin-bottom: 10px;" class="btn"><i class="fa fa-arrow-circle-o-left"></i></button>
                    <button id="minDate-next" style="margin-bottom: 10px;" class="btn"><i class="fa fa-arrow-circle-o-right"></i></button>

                    <hr>
                    <div id="cal-heatmap"></div>
                    <hr>
                    <div id="detail-schedule"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <ol class="breadcrumb">
            <li><a href="{{ route('my-booking.index') }}">Back</a></li>
            <li class="active">@yield('title')</li>
        </ol>
        <div class="panel-body">
            <form role="form" action="{{ route('guest-booking.store') }}" method="post" class="form-horizontal">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label for="date" class="col-md-2 control-label">Tanggal</label>
                    <div class="col-md-4">
                        <input type="text" name="date" id="date-schedule" class="form-control" value="" readonly required>
                        @if ($errors->has('date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                    <label for="time" class="col-md-2 control-label">Jam</label>
                    <div class="col-md-4">
                        <input type="text" name="time" class="form-control time-schedule" value="" required>
                        @if ($errors->has('time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('time') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nomor_polisi') ? ' has-error' : '' }}">
                    <label for="nomor_polisi" class="col-md-2 control-label">Nomor Polisi</label>
                    <div class="col-md-4">
                        <input type="text" name="nomor_polisi" class="form-control" value="{{ old('nomor_polisi', $guest->nomor_polisi) }}" required>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('type_kendaraan') ? ' has-error' : '' }}">
                    <label for="type_kendaraan" class="col-md-2 control-label">Type Kendaraan</label>
                    <div class="col-md-4">
                        <input type="text" name="type_kendaraan" class="form-control" value="{{ old('type_kendaraan', $guest->type_kendaraan) }}" required>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                    <label for="service" class="col-md-2 control-label">service</label>
                    <div class="col-md-4">
                        <select
                            name="service" value="{{ old('service') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih service</option>

                            @foreach($services as $key => $item)
                                <option {{ old('service') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->nm_service }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('jenis_pelayanan') ? ' has-error' : '' }}">
                    <label for="jenis_pelayanan" class="col-md-2 control-label">Jenis Pelayanan</label>
                    <div class="col-md-4">
                        <select
                            name="jenis_pelayanan" value="{{ old('jenis_pelayanan') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih jenis pelayanan</option>
                            <option value="workshop">To workshop</option>
                            <option value="tms">Toyota Mobile Service</option>
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('easyService') ? ' has-error' : '' }}">
                    <label for="easyService" class="col-md-2 control-label">Easy Service</label>
                    <div class="col-md-4">
                        <select
                            name="easyService" value="{{ old('easyService') }}" class="form-control" required>
                            <option value="" disabled selected>Pilih easy service</option>
                            <option value="pickup">Pickup My - Car</option>
                            <option value="send">Send My - Car</option>
                            <option value="both">Pickup & Send My-Car</option>
                            <option value="self">Self Service</option>
                        </select>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                    <label for="keterangan" class="col-md-2 control-label">Keterangan</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="keterangan" required>{{ old('keterangan') }}</textarea>
                    </div>
                </div>
                <input type="hidden" name="id_schedule" id="id-schedule" value="">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-danger">Hapus</button>
                <a href="{{ route('guest-booking.index') }}" type="button" class="btn btn-danger">Batal</a>
            </form>
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

.cal-heatmap-container .q1 {
    stroke: red;
    stroke-width: 1;
}

</style>
<script type="text/javascript">
    var jadwalOperasional = {!! $jadwalOperasional !!}
    var jadwalOperasionalId = ""
    var cal = new CalHeatMap();
    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    var scheduleHighlight = [];
    var bookData = [];

    $('.time-schedule').datetimepicker({
        format: 'LT',
        sideBySide: true,
    });

    if (jadwalOperasional.length > 0) {
        jadwalOperasional.forEach((item) => {
            jadwalOperasionalId = item.id
            // scheduleHighlight.push(new Date(item.date))
            bookData.push({date: Math.round(new Date(item.date).getTime()/1000), value: 1})
        })
    }

    // example data
    var datas = [
        {date: 1525972255, value: 3},
        {date: 1526058655, value: 7},
        {date: 1526404255, value: 1},
        {date: 1526749855, value: 2},
    ]

    var afterLoadData = function (timestamps) {
        var offset = new Date().getTimezoneOffset() * 60;
        var results = {};
        for (var timestamp in timestamps) {
            var commitCount = timestamps[timestamp]
            timestamp = parseInt(timestamp, 10)
            results[timestamps[timestamp].date] = timestamps[timestamp].value
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
        displayLegend: false,
        data: bookData,
        afterLoadData: afterLoadData,
        start: currentDate,
        onClick: function(date, nb) {
            if (nb !== null) {
                if (!moment(date).isBefore(moment(), "day")) {
                    getDate(date)
                    $("#detail-schedule").html("Anda memilih pada <b>" +
                        moment(date).format('MMMM Do YYYY') + "</b>"
                    );
                } else {
                    getDate(null)
                    $("#detail-schedule").html("Anda memilih tanggal yang sudah lewat pada <b>" +
                        moment(date).format('MMMM Do YYYY') + "</b>"
                    );
                }
            } else {
                $("#detail-schedule").empty();
                getDate(null)
            }
        }
    });

    function getDate (value) {
        if (value === null) {
            $("#date-schedule").val("")
            $("#id-schedule").val("")
        } else {
            $("#date-schedule").val(moment(value).format('YYYY-MM-DD'))
            $("#id-schedule").val(jadwalOperasionalId)
        }
    }

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