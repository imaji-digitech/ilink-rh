@php use Carbon\Carbon; @endphp
    <!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            margin: 0;
        }

        table, th, td {
            border-collapse: collapse;
        }

        .table table, .table th, .table td {
            border-collapse: collapse;
            border: .5px solid black;
        }
    </style>
</head>
<body>
<main style="width:100%;padding: 0 0">
    <img src="{{ public_path('asset-pdf/invoice.png') }}" style="width: 100%; position: absolute" alt="">
    <div style="z-index: 2; position: absolute; width: 100%">
        {{--        @for($j=0;$j<2;$j++)--}}
        <div style="height: 130px;margin: 0;padding:0;">
            <div style="height: 90px"></div>
            <div>
                <table style="width: 100%">
                    <tr>
                        <td style="width: 40%"></td>
                        <td style="width: 60%; text-align: right; padding-right: 70px; font-size: 14px">
                            <b style="font-family: 'Arial';font-size: 24px">INVOICE</b> <br>
                            No: &nbsp;&nbsp; {{ $invoice->invoice_number }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 60%"></td>
                        <td style="width: 40%; text-align: left; padding-left: 70px; font-size: 14px">
                            <b>Kepada</b>
                            <br>
                            <div
                                style="width: 255px;margin-top: 10px; border-bottom-color: #0b0b0b;border-bottom: 1px solid">
                                {{ $invoice->company }}
                            </div>
                            <div
                                style="width: 255px;margin-top: 10px; border-bottom-color: #0b0b0b;border-bottom: 1px solid">
                                {{ $invoice->address }} &nbsp;
                            </div>
                        </td>
                    </tr>
                </table>
                <div style="padding: 0 70px; margin: 0; font-size:14px;height: 417px; ">
                    <p style="text-align: justify;text-justify: inter-word;">Pada

                        hari {{ Carbon::parse($invoice->created_at)->isoFormat('dddd') }},
                        tanggal {{ Carbon::parse($invoice->created_at)->isoFormat('D MMMM Y') }}, telah diterima
                        barang-barang dengan rincian
                        sebagai
                        berikut:</p>

                    <div style="min-height: 135px;">
                        <table class="table" style="width: 100%; font-size: 12px">
                            <tr style="background-color: #ACEAA0; font-weight: bold; text-align: center">
                                <td>No.</td>
                                <td>Jenis Barang/Jasa</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Total</td>
                            </tr>
                            @foreach($invoice->invoiceDetails as $index=>$detail)
                                {{--                                    ,'invoice_id', 'title', 'price', 'quantity', 'quantity_type', 'note',--}}
                                <tr>
                                    <td style="text-align: center">{{ $index+1 }}</td>
                                    <td style="padding: 3px">{{ $detail->title }}</td>
                                    <td style="text-align: center">{{ thousand_format($detail->quantity).$detail->quantity_type }}</td>
                                    <td>
                                        <span
                                            style="text-align: left; display: inline-block; width: 10%;padding: 3px;">Rp. </span>
                                        <span
                                            style="text-align: right; display: inline-block; width: 80%;">{{ thousand_format($detail->price) }}</span>
                                    </td>
                                    <td><span
                                            style="text-align: left; display: inline-block; width: 10%;padding: 3px;">Rp. </span>
                                        <span
                                            style="text-align: right; display: inline-block; width: 80%;">{{ thousand_format($detail->quantity*$detail->price) }}</span>
                                    </td>

                                </tr>
                            @endforeach
                            <tr style="background-color: #ACEAA0; font-weight: bold; text-align: center">
                                <td colspan="4">Total</td>
                                <td>
                                    <span
                                        style="text-align: right; display: inline-block; width: 10%;padding: 3px;">Rp. </span>
                                    <span style="text-align: right; display: inline-block; width: 80%;">
                                            {{ thousand_format($invoice->invoiceDetails->sum(function ($row) {return $row->quantity * $row->price;})) }}
                                        </span>

                                </td>
                            </tr>

                        </table>
                    </div>
                    <p>
                        <b>No Rekening:</b> <br>
                        <b>BRI - 002101002496300 I  BCA - 0242301020</b> <br>
                        <b>A/n CV Imaji Sociopreneur</b><br>
                        (Harap mengirimkan foto.screenshot gambar bukti transfer kepada kami)

                    </p>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 70%"></td>
                            <td style="text-align: center">Jember, {{ Carbon::parse($invoice->created_at)->isoFormat('D MMMM YYYY') }}</td>
                        </tr>
                        <tr>
                            <td>
                                <br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: center"><u>ROHMAN ABADI</u><br>Direktur Lingkungan</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        {{--        @endfor--}}
    </div>

</main>
</body>
</html>
