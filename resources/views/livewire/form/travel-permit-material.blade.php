<div>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            </thead>
            <tbody>
            @foreach($travelPermit->travelPermitDetails as $detail)
                <tr>
                    <td><a href="#" wire:click="delete({{$detail->id}})"><i class="fa fa-trash"></i></a> </td>
                    <td>{{ $detail->material->name }}</td>
                    <td>{{ thousand_format($detail->quantity).$detail->quantity_type }}</td>
                    <td>{{ $detail->note }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br><br>

    <div>


    <a href="{{ route('travel-permit.download',$travelPermitId) }}" class="btn btn-success m-r-15 ">Unduh surat</a>
    <a href="{{ route('travel-permit.index') }}" class="btn btn-primary">Selesai</a>
    </div>
    <br><br><br>

    <form wire:submit.prevent="create">
        <x-form.select :options="$optionMaterial" :selected="$data['material_id']" title="Nama material" model="data.material_id"/>
        <x-form.input type="number" title="Jumlah" model="data.quantity"/>
        <x-form.input type="text" title="Satuan" model="data.quantity_type"/>
        <x-form.textarea title="Keterangan tambahan" model="data.note"/>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
