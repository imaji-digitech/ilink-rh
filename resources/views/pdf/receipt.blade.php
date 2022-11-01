<!DOCTYPE html>
<html lang="en" style="margin: 0;padding: 0">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <link rel="stylesheet" href="{{public_path('vendor/bootstrap.min.css')}}">--}}
{{--    <title>{{ 'NOTA PEMBAYARAN - '.$transaction->transaction->no_invoice.' - '.$transaction->transaction->user->name }}</title>--}}
    <style>
        @page {
            margin: 0in;
        }

        body {
            background-image: url({{ public_path('asset-pdf/template_recycle_hub.jpg') }});
            background-position: top left;
            background-repeat: no-repeat;
            background-size: 100%;
            width: 100%;
            height: 100%;
        }
        table, th, td {
            /*border: 1px solid black;*/
            border-collapse: collapse;
        }
    </style>
</head>
<body >
<main style="width:100%;padding: 0 0" id="content">
    <div style="height: 150px"></div>
    <div style="padding: 0 10px">
        <table style="font-size: 11px;width: 100%">
            <tr>
                <td style="width: 70px"><b>Customer</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>No. Invoice</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 70px"><b>No Telp</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>Tanggal</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 70px"><b>Alamat</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>Pembayaran</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
        </table>
{{--        @php($detail=$transaction->transactionReturnDetails)--}}
        <table bordercolor="#000000" style="margin-top:10px;width: 100%; font-size: 11px">
            <tr style="text-align: center">
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    Nama Barang
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 60px">
                    Qty
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 100px">
                    Harga Satuan
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px"> Total
                </th>
            </tr>
            @for($i=0;$i<10;$i++)
                <tr>
                    <td style="text-align:left;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:center;height:12px;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                </tr>

            @endfor
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid;">Sub total :</td>
                <td style="border: .5px solid"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid;">Pajak :</td>
                <td style="border: .5px solid">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid;"><b>Total :</b></td>
                <td style="border: .5px solid"></td>
            </tr>
        </table>
        <br>

        <table style="width: 100%;font-size: 12px;text-align: center">
            <tr>
                <td style="width: 50%"><b>Penerima/Pembeli</b></td>
                <td style="width: 50%"><b>Sociopreneur Community</b></td>
            </tr>
        </table>


    </div>
    <div style="height: 230px"></div>

    <div style="padding: 0 10px">
        <table style="font-size: 11px;width: 100%">
            <tr>
                <td style="width: 70px"><b>Customer</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>No. Invoice</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 70px"><b>No Telp</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>Tanggal</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 70px"><b>Alamat</b></td>
                <td style="width: 10px">:</td>
                <td style="width: 260px"></td>
                <td style="width: 70px"><b>Pembayaran</b></td>
                <td style="width: 10px">:</td>
                <td></td>
            </tr>
        </table>
        {{--        @php($detail=$transaction->transactionReturnDetails)--}}
        <table bordercolor="#000000" style="margin-top:10px;width: 100%; font-size: 11px">
            <tr style="text-align: center">
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">
                    Nama Barang
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 60px">
                    Qty
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 100px">
                    Harga Satuan
                </th>
                <th style="border: .5px solid;padding-top:0;padding-bottom: 5px"> Total
                </th>
            </tr>
            @for($i=0;$i<10;$i++)
                <tr>
                    <td style="text-align:left;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:center;height:12px;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                    <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">

                    </td>
                </tr>

            @endfor
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid; text-align: right">Sub total :</td>
                <td style="border: .5px solid"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" style="text-align:right;border: .5px solid; text-align: right"><b>Total :</b></td>
                <td style="border: .5px solid"></td>
            </tr>
        </table>
        <br>

        <table style="width: 100%;font-size: 12px;text-align: center">
            <tr>
                <td style="width: 50%"><b>Penerima/Pembeli</b></td>
                <td style="width: 50%"><b>Sociopreneur Community</b></td>
            </tr>
        </table>


    </div>

</main>
</body>
</html>
