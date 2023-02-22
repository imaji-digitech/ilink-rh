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
    <img src="{{ public_path('asset-pdf/template_recycle_hub.jpg') }}" style="width: 100%; position: absolute" alt="">
    <div style="z-index: 2; position: absolute; width: 100%">
        @for($j=0;$j<2;$j++)
            <div style="height: 130px;margin: 0;padding:0;">
                <div style="height: 90px"></div>
                <div>
                    <table style="width: 100%">
                        <tr>
                            <td style="width: 40%"></td>
                            <td style="width: 60%; text-align: center; font-size: 14px">
                                <b style="font-family: 'Arial';font-size: 18px">BUKTI TANDA TERIMA BARANG</b> <br>
                                {{ $good->good_receipt_number }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div style="padding: 0 70px; margin: 0; font-size:14px;height: 417px; ">
                <p style="text-align: justify;text-justify: inter-word;">Pada
                    hari {{ $good->created_at->isoFormat('dddd') }},
                    tanggal {{ $good->created_at->isoFormat('D MMMM Y') }}, telah diterima barang-barang dari ........................ dengan rincian
                    sebagai
                    berikut:</p>

                <div style="min-height: 135px;">
                    <table class="table" style="width: 100%; font-size: 12px">
                        <tr style="background-color: #ACEAA0; font-weight: bold; text-align: center">
                            <td>No.</td>
                            <td>Jenis Barang</td>
                            <td>Jumlah</td>
                            <td>Keterangan</td>
                        </tr>
                        @foreach($good->goodReceiptDetails as $index=>$detail)
                            <tr>
                                <td style="text-align: center">{{ $index+1 }}</td>
                                <td>{{ $detail->material->name }}</td>
                                <td style="text-align: center">{{ $detail->quantity.' '.$detail->quantity_type }}</td>
                                <td style="text-align: center">
                                    {{ $detail->note }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <p style="text-align: justify;text-justify: inter-word;">Barang telah diterima dalam keadaan
                    <b>{{ $good->condition }}</b> untuk dapat dipergunakan dengan sebagaimana mestinya.</p>
                <table style="width: 100%">
                    <tr>
                        <td style="text-align: center;">Pengirim</td>
                        <td></td>
                        <td style="text-align: center">Penerima</td>
                    </tr>
                    <tr>
                        <td>
                            <br><br><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">(..........................................)</td>
                        <td></td>
                        <td style="text-align: center">(..........................................)</td>
                    </tr>
                </table>
            </div>
        @endfor
    </div>

</main>
</body>
</html>
