<div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            {{--            'title', 'quantity', 'note'--}}
            <th>#</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Keterangan</th>
            <th>Total</th>
            </thead>
            <tbody>
            @foreach($receipt->receiptDetails as $detail)
                <tr>
                    <td><a href="#" wire:click="delete({{$detail->id}})"><i class="fa fa-trash"></i></a> </td>
                    <td>{{ $detail->title }}</td>
                    <td>{{ thousand_format($detail->quantity).$detail->quantity_type }}</td>
                    <td>{{ thousand_format($detail->price) }}</td>
                    <td>{{ $detail->note }}</td>
                    <td>Rp. {{ thousand_format($detail->price*$detail->quantity) }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br><br>

    <form wire:submit.prevent="create">
        <x-form.input type="text" title="Nama barang/jasa" model="data.title"/>
        <x-form.input type="number" title="Jumlah" model="data.quantity"/>
        <x-form.input type="text" title="Satuan" model="data.quantity_type"/>
        <x-form.input type="text" title="harga" model="data.price"/>
        <x-form.textarea title="Keterangan tambahan" model="data.note"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
