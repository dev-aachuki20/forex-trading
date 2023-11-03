<form wire:submit.prevent="update" class="tablelist-form" autocomplete="off">

    @if($languagedata->count()>0)
        @foreach($languagedata as $language)
        <div class="mb-3">
            <label  class="form-label"> {{__('cruds.Value')}} ({{ __('cruds.' . $language->name) }})</label>
            <input type="text" wire:model="values.{{$language->id}}"  class="form-control" placeholder=" {{__('cruds.Value')}}" />
            @error('values.'.$language->id)
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        @endforeach
    @endif
    
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