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
    </style>
    <body>

    <div style="margin:20px; padding: 30px;">
        <section style="border-bottom:2px dotted #000;margin:-18px 0px 10px 0;padding-bottom:10px">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="25%" align="left">
                        <img width="120px" src="{{ public_path(). '/img/astrido.png' }}">
                    </td>
                    <td width="50%" align="center">
                        <h2>Laporan Data Booking</h2>
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

        <section style=" border:1px solid #000; margin:5px;padding:5px">
            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="70%" valign="top">
                        <section>
                            <table cellpadding="3" cellspacing="2" width="100%">
								<thead>
									<tr>
										<td valign="top" style="border-right: 1px solid #000;border-left: 1px solid #000; width: 100px; text-align: center;">
											Perihal
										</td>
										<td valign="top" style="border-right: 1px solid #000; width: 300px; text-align: center;">
											Detail Keterangan
										</td>
										<td valign="top" style="border-right: 1px solid #000; width: 100px; text-align: center;">
											Tindak Lanjut
										</td>
									</tr>
								</thead>
								<tbody>
									<tr>
									</tr>
								</tbody>
                            </table>
                        </section>
                    </td>
                </tr>
            </table>
        </section>
    </div>

    </body>
</html>
