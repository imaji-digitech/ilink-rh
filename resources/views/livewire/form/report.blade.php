<form wire:submit.prevent="create">
    <x-form.textarea title="Catatan" model="note"/>
    <div class="form-group col-span-6 sm:col-span-5"></div>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
