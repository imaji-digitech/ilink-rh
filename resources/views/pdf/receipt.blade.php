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
    </style>
</head>
<body >
<main style="width:100%;padding: 0 0" id="content">
    <img src="{{ public_path('asset-pdf/receipt_recycle_hub.jpg') }}" style="width: 100%; position: absolute" alt="">
    <div style="z-index: 2; position: absolute; width: 100%">
        @for($j=0;$j<2;$j++)
            <div style="height: 130px;">
                <div style="height: 90px"></div>
                <div>
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 40%"></td>
                            <td style="width: 60%; text-align: center; font-size: 14px">
                                <b style="font-family: 'Arial';font-size: 18px"></b> <br>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="padding: 0 70px; font-size:14px;height: 431px">
                <table style="font-size: 11px;width: 100%">
                    <tr>
                        <td style="width: 70px"><b>Perusahaan</b></td>
                        <td style="width: 10px">:</td>
                        <td style="width: 260px">{{ $receipt->company}} {{ (($receipt->company!=null and $receipt->name!=null)?' - ' :'') }} {{ $receipt->name }}  </td>
                        <td style="width: 70px"><b>No. Kwitansi</b></td>
                        <td style="width: 10px">:</td>
                        <td>{{ $receipt->receipt_number }}</td>
                    </tr>
                    <tr>
                        <td style="width: 70px"><b>No Telp</b></td>
                        <td style="width: 10px">:</td>
                        <td style="width: 260px">{{ $receipt->no_phone  }}</td>
                        <td style="width: 70px"><b>No. Refrensi</b></td>
                        <td style="width: 10px">:</td>
                        <td>{{ $receipt->ref_number }}</td>
                    </tr>
                    <tr>
                        <td style="width: 70px"><b>Alamat</b></td>
                        <td style="width: 10px">:</td>
                        <td style="width: 260px">{{ $receipt->address }}</td>

                        <td style="width: 70px"><b>Tanggal</b></td>
                        <td style="width: 10px">:</td>
                        <td>{{ $receipt->created_at->format('d-m-Y') }}</td>
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
                    @php($detail=$receipt->receiptDetails)

                    @for($i=0;$i<10;$i++)
                        <tr>
                            <td style="text-align:left;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                                {{(isset($detail[$i])? $detail[$i]->title: ' ')}}
                            </td>
                            <td style="text-align:center;height:12px;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                                {{(isset($detail[$i])? $detail[$i]->quantity: ' ')}}
                            </td>
                            <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                                {{(isset($detail[$i])? thousand_format($detail[$i]->price): ' ')}}
                            </td>
                            <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">
                                {{(isset($detail[$i])? thousand_format($detail[$i]->price*$detail[$i]->quantity): ' ')}}
                            </td>
                        </tr>

                    @endfor

                    <tr>
                        <td></td>
                        <td colspan="2" style="text-align:right;border: .5px solid;"><b>Total :</b></td>
                        <td style="border: .5px solid;text-align:right">{{ thousand_format($detail->sum(function ($t){return $t->quantity*$t->price; })) }}</td>
                    </tr>
                </table>
                <br>

                <table style="width: 100%;font-size: 12px;text-align: center">
                    <tr>
                        <td style="width: 50%"><b>Penerima</b></td>
                        <td style="width: 50%"><b>Imaji Lingkungan</b></td>
                    </tr>
                    <tr>
                        <td><br><br><br><br><br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 50%"><b>{{ $receipt->company}} {{ (($receipt->company!=null and $receipt->name!=null)?' - ' :'') }} {{ $receipt->name }}</b></td>
                        <td style="width: 50%"><b>{{ $receipt->user->name }}</b></td>
                    </tr>
                </table>
            </div>
        @endfor
{{--        <div style="height: 150px"></div>--}}
{{--        <div style="padding: 0 70px">--}}
{{--            --}}
{{--        </div>--}}
{{--        <div style="height: 60px;"></div>--}}

{{--        <div style="height: 150px"></div>--}}

{{--        <div style="padding: 0 70px">--}}
{{--            <table style="font-size: 11px;width: 100%">--}}
{{--                <tr>--}}
{{--                    <td style="width: 70px"><b>Perusahaan</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td style="width: 260px">{{ $receipt->company.' - ' }} {{ $receipt->name }}  </td>--}}
{{--                    <td style="width: 70px"><b>No. Kwitansi</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td>{{ $receipt->receipt_number }}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="width: 70px"><b>No Telp</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td style="width: 260px">{{ $receipt->no_phone  }}</td>--}}
{{--                    <td style="width: 70px"><b>No. Refrensi</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td>{{ $receipt->ref_number }}</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="width: 70px"><b>Alamat</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td style="width: 260px">{{ $receipt->address }}</td>--}}

{{--                    <td style="width: 70px"><b>Tanggal</b></td>--}}
{{--                    <td style="width: 10px">:</td>--}}
{{--                    <td>{{ $receipt->created_at->format('d-m-Y') }}</td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--            --}}{{--        @php($detail=$transaction->transactionReturnDetails)--}}
{{--            <table bordercolor="#000000" style="margin-top:10px;width: 100%; font-size: 11px">--}}
{{--                <tr style="text-align: center">--}}
{{--                    <th style="border: .5px solid;padding-top:0;padding-bottom: 5px">--}}
{{--                        Nama Barang--}}
{{--                    </th>--}}
{{--                    <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 60px">--}}
{{--                        Qty--}}
{{--                    </th>--}}
{{--                    <th style="border: .5px solid;padding-top:0;padding-bottom: 5px;width: 100px">--}}
{{--                        Harga Satuan--}}
{{--                    </th>--}}
{{--                    <th style="border: .5px solid;padding-top:0;padding-bottom: 5px"> Total--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--                @php($detail=$receipt->receiptDetails)--}}

{{--                @for($i=0;$i<10;$i++)--}}
{{--                    <tr>--}}
{{--                        <td style="text-align:left;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">--}}
{{--                            {{(isset($detail[$i])? $detail[$i]->title: ' ')}}--}}
{{--                        </td>--}}
{{--                        <td style="text-align:center;height:12px;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">--}}
{{--                            {{(isset($detail[$i])? $detail[$i]->quantity: ' ')}}--}}
{{--                        </td>--}}
{{--                        <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">--}}
{{--                            {{(isset($detail[$i])? thousand_format($detail[$i]->price): ' ')}}--}}
{{--                        </td>--}}
{{--                        <td style="text-align:right;padding:0 5px;border-right: .5px solid;border-left: .5px solid;{{$i==9?'border-bottom: .5px solid':''}}">--}}
{{--                            {{(isset($detail[$i])? thousand_format($detail[$i]->price*$detail[$i]->quantity): ' ')}}--}}
{{--                        </td>--}}
{{--                    </tr>--}}

{{--                @endfor--}}

{{--                <tr>--}}
{{--                    <td></td>--}}
{{--                    <td colspan="2" style="text-align:right;border: .5px solid;"><b>Total :</b></td>--}}
{{--                    <td style="border: .5px solid">{{ thousand_format($detail->sum(function ($t){return $t->quantity*$t->price; })) }}</td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--            <br>--}}

{{--            <table style="width: 100%;font-size: 12px;text-align: center">--}}
{{--                <tr>--}}
{{--                    <td style="width: 50%"><b>Penerima</b></td>--}}
{{--                    <td style="width: 50%"><b>Imaji Lingkungan</b></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td><br><br><br><br><br><br></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td style="width: 50%"><b>{{ $receipt->company}} {{ (($receipt->company!=null and $receipt->name!=null)?' - ' :'') }} {{ $receipt->name }}</b></td>--}}
{{--                    <td style="width: 50%"><b>{{ $receipt->user->name }}</b></td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--        </div>--}}
    </div>

</main>
</body>
</html>
