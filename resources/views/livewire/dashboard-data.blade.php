<div>
    <div class="row">
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <x-simple-card icon="truck" title="Surat Jalan" color="bg-secondary" :value="$generalData['travel_permit']"/>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <x-simple-card icon="file" title="Invoice keluar" color="bg-success" :value="$generalData['invoice']"/>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <x-simple-card icon="log-out" title="Kwitansi keluar" color="bg-danger"
                           :value="$generalData['receipt']"/>
        </div>
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <x-simple-card icon="log-in" title="Barang masuk" color="bg-primary" :value="$generalData['good_receipt']"/>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 appointment box-col-6">
            <div class="card">
                <div class="radar-chart p-3">
                    <div id="mutation"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 appointment box-col-6">
            <div class="card">
                <div class="radar-chart p-3">
                    <div id="mutation2"></div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            var borderColor = ['#FAA255', '#F0C348', '#E27CF1', '#F562AC', '#EB5959', '#9EE67A', '#50D989', '#66CFF2', '#7F7CE6'];
            var options1 = {
                title: {
                    text: 'Mutasi material',
                    align: 'left',
                    floating: false,
                    style: {
                        fontSize: '28px',
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
                        return val.toFixed() + '% (' + opts.w.config.series[opts.seriesIndex].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + 'kg)';
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
                    position: 'right',
                    offsetX: 0,
                    offsetY: 50,
                    showForSingleSeries: false,
                    showForNullSeries: true,
                    showForZeroSeries: true,
                },
                series: [
                    @foreach($mutationData as $md)
                        {{ ($md->amount!=null)?$md->amount:0 }},
                    @endforeach
                ],

                labels: [
                    @foreach($mutationData as $md)
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
                            background: 'transparent',
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
                                        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "Kg"
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
                                        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "Kg"
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
                                        }, 0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + "Kg"
                                    }
                                }
                            }
                        },
                    }
                },
                colors: borderColor,
            }

            new ApexCharts(
                document.querySelector("#mutation"),
                options1
            ).render();
        });
    </script>

</div>
