@props([
'title' => 'no title',
'data' => [],
'dataTitle' => [],
'categories' => [],
'unit'=>''
])
@php($id=generateRandomString())
<div class="col-xl-12 xl-100 dashboard-sec box-col-12">
    <div class="card earning-card">
        <div class="card-body ">
            <div id="{{ $id }}"></div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        var borderColor = ['#FAA255', '#F0C348', '#E27CF1', '#F562AC', '#EB5959', '#9EE67A', '#50D989', '#66CFF2', '#7F7CE6'];
        // currently sale
        var options = {
            title: {
                text: '{{ $title }}',
                align: 'left',
                floating: false,
                style: {
                    fontSize: '20px',
                    fontWeight: 'bold',
                    fontFamily: undefined,
                    color: '#263238'
                },
            },
            series: [
                    @foreach($dataTitle as $index=>$d)
                {
                    name: '{{ $d }}',
                    data: [

                        @foreach($data[$index] as $d1)
                            {{$d1}},
                        @endforeach
                    ]
                },
                @endforeach
            ],
            chart: {
                height: 320,
                type: 'line',

            },

            dataLabels: {
                enabled: true,
                formatter: function (val, opts) {
                    return val.toString().replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                },
            },
            stroke: {
                curve: 'straight'
            },
            xaxis: {
                type: 'category',
                show: true,
                categories: [

                    @foreach($categories as $c)
                        '{{$c}}',
                    @endforeach

                ],

            },
            markers: {
                strokeColors: borderColor,
                hover: {
                    size: 6,
                }
            },

            colors: borderColor,

            legend: {
                position: 'bottom',
                offsetX: 0,
                offsetY: -10,
            },
        };

        var chart = new ApexCharts(document.querySelector("#{{$id}}"), options);
        chart.render();
    });
</script>
