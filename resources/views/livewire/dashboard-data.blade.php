<div>
    <div class="row">
        <div class="col-sm-6 col-xl-3 col-lg-6">
            <x-simple-card icon="truck" title="Surat Jalan" color="bg-secondary"
                           :value="$generalData['travel_permit']"/>
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
        <x-data-pie :data="$mutationData" title="Mutasi material keseluruhan" unit="Kg"/>
        <x-data-pie :data="$mutationDataThisMonth" title="Mutasi material bulan ini" unit="Kg"/>
        @foreach($mutation as $m)
            <x-data-pie :data="$m['data']" title="Mutasi {{ $m['title'] }}" size="4" legend="bottom" unit="Kg"/>
        @endforeach
    </div>
    <div class="row">
        <x-data-line title="Barang keluar - masuk" :data="$ioMutation['data']" :data-title="$ioMutation['title']" :categories="$ioMutation['category']"/>
    </div>
    <div class="row">
        <x-data-line title="Barang produksi" :data="$productionMutation['data']" :data-title="$productionMutation['title']" :categories="$productionMutation['category']"/>
    </div>

</div>
