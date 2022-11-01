<div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Barang/jasa</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Total</th>
            </thead>
            <tbody>
            @foreach($invoice->invoiceDetails as $detail)
                <tr>
                    <td><a href="#" wire:click="delete({{$detail->id}})"><i class="fa fa-trash"></i></a> </td>
                    <td>{{ $detail->title }}</td>
                    <td>{{ thousand_format($detail->price) }}</td>
                    <td>{{ thousand_format($detail->quantity).$detail->quantity_type }}</td>
                    <td>{{ $detail->note }}</td>
                    <td>{{ thousand_format($detail->quantity*$detail->price) }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br><br>

    <form wire:submit.prevent="create">
        <x-form.input type="text" title="Nama barang/jasa" model="data.title"/>
        <x-form.input type="number" title="Harga" model="data.price"/>
        <x-form.input type="number" title="Jumlah" model="data.quantity"/>
        <x-form.input type="text" title="Satuan" model="data.quantity_type"/>
        <x-form.textarea title="Keterangan tambahan" model="data.note"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
