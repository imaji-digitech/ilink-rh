<form wire:submit.prevent="{{$action}}">
    <x-form.input type="text" title="Nama Material" model="data.name"/>
    <x-form.input type="text" title="Jenis Material" model="data.type"/>
    <x-form.textarea title="Catatan barang" model="data.note"/>
{{--    <x-form.select :options="$optionMaterialType" :selected="$data['material_type_id']" title="Jenis material" model="data.material_type_id"/>--}}
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
