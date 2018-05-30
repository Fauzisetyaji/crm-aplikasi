<!DOCTYPE html>
    <html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cetak Laporan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style type="text/css">
        body,html {margin:5px;padding:5px;}
        * {font-family: arial;font-size:7px;}
        h1 {font-size: 18px;margin:0}
        h2 {font-size: 16px}
        h3 {font-size: 14px}
        p {margin:4px 0 8px 0; padding:0;}
        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 3px;
        }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 3cm;
            height: 4cm; 

            /** Extra personal styles **/
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            line-height: 35px;
        }
        .red {
            background-color: red;
            opacity: 0.4;
        }

        .yellow {
            background-color: yellow;
            opacity: 0.3;
        }

        .blue {
            background-color: blue;
            opacity: 0.3;
        }

        .green {
            background-color: green;
            opacity: 0.3;
        }


    </style>
    <body>
    <header>
        <div style="margin:20px; padding: 30px;">
            <section style="border-bottom:2px dotted #000;margin:-18px 0px 10px 0;padding-bottom:10px">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="25%" align="left">
                            <img width="120px" src="{{ public_path(). '/img/astrido.png' }}">
                        </td>
                        <td width="50%" align="center">
                            <h2>Laporan Rekapitulasi Tahunan Top Service</h2>
                        </td>
                        <td width="25%" align="right">
                            <h3>
                                <b>Astrido Toyota Pondok Cabe</b>
                                <p>Jl. Pd. Cabe Raya No.1, RT.3/RW.3,
                                <br>Pd. Cabe Ilir, Pamulang,
                                <br>Kota Tangerang Selatan, Banten 15418
                                <br>T (021) 7421888</p>
                            </h3>
                        </td>
                    </tr>
                </table>
            </section>
            <section style="margin-bottom:5px;padding-bottom:5px">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="80%" valign="top">
                            <section>
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="3%" valign="top">
                                            <p><b>Keperluan</b></p>
                                        </td>
                                        <td width="30%" valign="top">
                                            <p><b>: Reporting </b></p>
                                        </td>
                                    </tr>
                                </table>
                            </section>
                        </td>
                        <td width="20%" valign="top">
                            <section>
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="5%" valign="top" align="right">
                                            <p><b>Tanggal</b></p>
                                        </td>
                                        
                                        <td width="5%" valign="top" align="right">
                                            <p>: {{ date('F d, Y') }}</p>
                                        </td>
                                        
                                    </tr>
                                </table>
                            </section>
                        </td>
                    </tr>
                </table>
            </section>

            <section style=" border:1px solid #000;">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="100%" valign="top">
                            <section>
                                <table cellpadding="3" cellspacing="2" width="100%">
                                    <thead>
                                        <tr style="background-color: #eee;">
                                            <td height="10" style="border-right: 1px solid #000; width: 60px; text-align: center;">
                                                <p style="text-align: center; font-size: 12px; font-weight: 800;">Periode</p>
                                            </td>
                                            @foreach($services as $key => $item)
                                            <td height="10" style="border-right: 1px solid #000; width: 60px; text-align: center;">
                                                <p style="text-align: center; font-size: 12px; font-weight: 800;">{{ $item->nm_service }}</p>
                                            </td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $key => $value)
                                        <tr style="border: 2px solid black; border-spacing: 5px;">
                                            <td class="red" style="padding-top: 12px; padding-bottom: 12px; border-top: 1px solid #000; border-right: 1px solid #000; width: 50px;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 600;">{{ $periodes[$key] }}</p>
                                            </td>
                                            @foreach($services as $k => $val)
                                                @if ($k === $key)
                                                <td class="" style="border-top: 1px solid #000; border-right: 1px solid #000; width: 50px;">
                                                    <p style="text-align: center; font-size: 9px; font-weight: 600;">{{ count($val->bookings) }}</p>
                                                </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </section>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </header>

    <footer>
        <div>
            <section>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="25%" align="left">
                            
                        </td>
                        <td width="40%" align="center">
                            
                        </td>
                        <td width="35%" align="right">
                            <h3>
                                <b>
                                    <p style="margin-right: 10px;">Mengetahui</p>
                                    <p>(Kepala Cabang)</p>
                                </b>
                            </h3>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </footer>


    </body>
</html>
