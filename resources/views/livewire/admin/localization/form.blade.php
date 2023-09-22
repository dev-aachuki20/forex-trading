<form wire:submit.prevent="update" class="tablelist-form" autocomplete="off">

    <div class="mb-3">
        <label for="customername-field" class="form-label"> {{__('cruds.Value')}}</label>
        <input type="text" wire:model="value" id="customername-field" class="form-control" placeholder=" {{__('cruds.Value')}}" />
        @error('value')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>



    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">
                {{__('cruds.update')}}
            </button>
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">

                {{__('cruds.cancel')}}

            </button>
        </div>
    </div>

</form>