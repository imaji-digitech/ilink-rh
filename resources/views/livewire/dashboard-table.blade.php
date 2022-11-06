<div class="card">
    <div class="card-header p-3">
        <h2>Pelaksanaan Kegiatan</h2>
    </div>
    <div class="card-body">
        <div class="row">
            @for($i=1;$i<=6;$i++)
                @if($lastweek<$i)
                    @continue
                @endif
                <button wire:click="setWeekNow({{$i}})" class="btn btn-secondary col m-1">Minggu {{$i}}</button>
            @endfor

        </div>
        <div class="row">
            <table class="table table-bordered border-dark" style="border-color: black !important;">
                <tr style="border-color: black">
                    <td style="width: 10%; text-align: center;vertical-align: middle;border-color: black !important;">
                        Tanggal
                    </td>
                    <td style="width: 20%; text-align: center;vertical-align: middle;border-color: black">
                        Barang Masuk
                    </td>
                    <td style="width: 20%; text-align: center;vertical-align: middle;border-color: black">
                        Barang Keluar
                    </td>
                    <td style="width: 20%; text-align: center;vertical-align: middle;border-color: black">
                        Barang Diproses
                    </td>
                    <td style="width: 20%; text-align: center;vertical-align: middle;border-color: black">
                        Barang Jadi
                    </td>
                    <td style="width: 10%; text-align: center;vertical-align: middle;border-color: black">
                        Hasil residu
                    </td>
                </tr>
                @for($i=1;$i<=7;$i++)
                    @if($weekNow==1 and $first>$i)
                        @continue
                    @endif
                    @if($weekNow==$lastweek and $lastDay<$i)
                        @continue
                    @endif
                    <tr style="border-color: black">
                        <td style=" text-align: center;vertical-align: middle;border-color: black">
                            {{ "Minggu ".$weekNow }} <br>
                            {{ day_name($i) }}
                        </td>
                        <td style=" text-align: center;vertical-align: middle;border-color: black;@isset($dataTable[$weekNow][$i][4]) @else background-color: black @endisset">
                            @isset($dataTable[$weekNow][$i][4])
                                @foreach($dataTable[$weekNow][$i][4]['value'] as $index=>$value)
                                    {{$dataTable[$weekNow][$i][4]['name'][$index]}} {{ $value }}kg <br>
                                @endforeach
                            @endisset
                        </td>
                        <td style=" text-align: center;vertical-align: middle;border-color: black;@isset($dataTable[$weekNow][$i][5]) @else background-color: black @endisset">
                            @isset($dataTable[$weekNow][$i][5])
                                @foreach($dataTable[$weekNow][$i][5]['value'] as $index=>$value)
                                    {{$dataTable[$weekNow][$i][5]['name'][$index]}} {{ $value }}kg <br>
                                @endforeach
                            @endisset
                        </td>
                        <td style=" text-align: center;vertical-align: middle;border-color: black;@isset($dataTable[$weekNow][$i][1]) @else background-color: black @endisset">
                            @isset($dataTable[$weekNow][$i][1])
                                @foreach($dataTable[$weekNow][$i][1]['value'] as $index=>$value)
                                    {{$dataTable[$weekNow][$i][1]['name'][$index]}} {{ $value }}kg <br>
                                @endforeach
                            @endisset
                        </td>
                        <td style=" text-align: center;vertical-align: middle;border-color: black;@isset($dataTable[$weekNow][$i][2]) @else background-color: black @endisset">
                            @isset($dataTable[$weekNow][$i][2])
                                @foreach($dataTable[$weekNow][$i][2]['value'] as $index=>$value)
                                    {{$dataTable[$weekNow][$i][2]['name'][$index]}} {{ $value }}kg <br>
                                @endforeach
                            @endisset
                        </td>
                        <td style=" text-align: center;vertical-align: middle;border-color: black;@isset($dataTable[$weekNow][$i][3]) @else background-color: black @endisset">
                            @php($c=0)
                            @isset($dataTable[$weekNow][$i][3])
                                @foreach($dataTable[$weekNow][$i][3]['value'] as $value)
                                    @php($c+=$value)
                                @endforeach
                            @endisset
                            {{ $c!=0?$c.'kg':'' }}
                        </td>
                    </tr>
                @endfor

            </table>
        </div>
    </div>
</div>
