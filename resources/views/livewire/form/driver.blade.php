<form wire:submit.prevent="{{$action}}">
    <x-form.input type="text" title="Nama driver" model="data.name"/>
    <x-form.input type="text" title="NIK driver" model="data.no_ktp"/>
    <x-form.input type="text" title="Nomer HP driver" model="data.no_phone"/>
    <x-form.textarea title="Alamat driver" model="data.address"/>
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
