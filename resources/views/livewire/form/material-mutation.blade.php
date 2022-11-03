<form wire:submit.prevent="{{$action}}">
    @if($materialId==null)
    <x-form.select :options="$optionMaterial" :selected="$data['material_id']" title="Nama material" model="data.material_id"/>
    @endif
    <x-form.select :options="$optionStatus" :selected="$data['mutation_status_id']" title="Status mutasi" model="data.mutation_status_id"/>
    <x-form.input type="number" title="Jumlah" model="data.amount"/>
    <x-form.textarea title="Catatan mutasi" model="data.note"/>
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
