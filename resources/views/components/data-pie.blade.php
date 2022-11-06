@props(['title','data','size'=>6,'legend'=>'right','unit'=>''])
@php($id=generateRandomString())
<div class="col-xl-{{$size}} appointment box-col-{{$size}}">
    <div class="card">
        <div class="card-Body">
            <div class="radar-chart">
                <div id="{{ $id }}"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        var borderColor = ['#FAA255', '#F0C348', '#E27CF1', '#F562AC', '#EB5959', '#9EE67A', '#50D989', '#66CFF2', '#7F7CE6'];
        var options1 = {
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
            tooltip: {
                enabled: false,
            },
            dataLabels: {
                formatter: function (val, opts) {
                    return val.toFixed() + '%  (' + opts.w.config.series[opts.seriesIndex].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '{{ $unit }})';
                },
            },
            chart: {
                height: 380,
                type: 'donut',
                toolbar: {
                    show: true,
                },
            },
            legend: {
                position: '{{$legend}}',
                offsetX: 0,
                @if($legend=='right')
                offsetY: 50,
                @endif
                showForSingleSeries: false,
                showForNullSeries: true,
                showForZeroSeries: true,
            },
            series: [
                @foreach($data as $md)
                    {{ ($md->value!=null)?$md->value:0 }},
                @endforeach
            ],

            labels: [
                @foreach($data as $md)
                    '{{ $md->title }}',
                @endforeach
            ],
            plotOptions: {
                pie: {
                    startAngle: 0,
                    endAngle: 360,
                    expandOnClick: true,
                    offsetX: 0,
                    offsetY: 0,
                    customScale: 1,
                    dataLabels: {
                        offset: 0,
                        minAngleToShowLabel: 10
                    },
                    donut: {
                        size: '65%',
                        bac{{ $unit }}round: 'transparent',
                        labels: {
                            show: true,
                            name: {
                                show: true,
                                fontSize: '22px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                fontWeight: 600,
                                color: undefined,
                                offsetY: -10,
                                formatter: function (val) {
                                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "{{$unit}}"
                                }
                            },
                            value: {
                                show: true,
                                fontSize: '16px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                fontWeight: 400,
                                color: undefined,
                                offsetY: 16,
                                formatter: function (val) {
                                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "{{ $unit }}"
                                }
                            },
                            total: {
                                show: true,
                                label: 'Total',
                                fontSize: '22px',
                                fontFamily: 'Helvetica, Arial, sans-serif',
                                fontWeight: 600,
                                color: '#373d3f',
                                formatter: function (w) {
                                    return w.globals.seriesTotals.reduce((a, b) => {
                                        return (a + b)
                                    }, 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "{{ $unit }}"
                                }
                            }
                        }
                    },
                }
            },
            colors: borderColor,
        }

        new ApexCharts(
            document.querySelector("#{{ $id }}"),
            options1
        ).render();
    });
</script>


