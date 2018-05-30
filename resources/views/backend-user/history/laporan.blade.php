<!DOCTYPE html>
    <html class="no-js">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>History Service</title>
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
                            <h2>History Service</h2>
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
                                        <td width="1%" valign="top">
                                            <p><b>:</b></p>
                                        </td>
                                        <td width="30%" valign="top">
                                            <p>Cetak Laporan</p>
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
    										<td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 800;">No SPP</p>
                                            </td>
                                            <td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
    											<p style="text-align: center; font-size: 9px; font-weight: 800;">Tgl SPP</p>
    										</td>
    										<td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 800;">Jenis Service</p>
                                            </td>
                                            <td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 800;">Suku Cadang</p>
                                            </td>
                                            <td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 800;">Keluhan</p>
                                            </td>
                                            <td height="20" style="border-right: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center; font-size: 9px; font-weight: 800;">Saran Perbaikan</p>
                                            </td>
                                            <td height="20" style="width: 80px; text-align: center;">
    											<p style="text-align: center; font-size: 9px; font-weight: 800;">Mekanik</p>
    										</td>
    									</tr>
    								</thead>
    								<tbody>
                                        
    									<tr style="border: 2px solid black; border-spacing: 5px;">
                                            <td style="padding-top: 12px; padding-bottom: 12px; border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">{{ str_pad(1 , 7, '0', STR_PAD_LEFT) }}</p>
                                            </td>
                                            <td style="padding-top: 12px; padding-bottom: 12px; border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">{{ $booking->date }}</p>
                                            </td>
                                            <td style="border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">{{ $booking->jenis_service }}</p>
                                            </td>
                                            <td style="border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">-</p>
                                            </td>
                                            <td style="border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">{{ $booking->keterangan }}</p>
                                            </td>
                                            <td style="border-top: 1px solid #000; border-right: 1px solid #000; width: 80px;">
                                                <p style="text-align: center;">{{ isset($saran[1]) ? $saran[1] : (isset($saran[0]) ? $saran[0] : '-') }}</p>
                                            </td>
                                            <td style="border-top: 1px solid #000; width: 80px; text-align: center;">
                                                <p style="text-align: center;">{{ isset($mekaniks[1]) ? $mekaniks[1]->nm_mekanik : (isset($mekaniks[0]) ? $mekaniks[0]->nm_mekanik : '-') }}</p>
                                            </td>
    									</tr>
    								</tbody>
                                </table>
                            </section>
                        </td>
                    </tr>
                </table>
            </section>
        </div>
        <div>
            <section>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="35%" align="left">
                            <div style="margin-left: 50px;">
                                <h2>
                                    <b>
                                        <p>Salam Hormat,</p>
                                        <p>Astrido Toyota Pondok Cabe</p>
                                    </b>
                                </h2>
                            </div>
                        </td>
                        <td width="40%" align="center">
                            
                        </td>
                        <td width="25%" align="right">
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </header>

    


    </body>
</html>
