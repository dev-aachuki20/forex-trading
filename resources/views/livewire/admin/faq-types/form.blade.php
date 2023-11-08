<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    @foreach($allLanguages as $lang)
    <div class="mb-3">
        <label  class="form-label">{{__('cruds.faq_type.fields.title') }} ({{ __('cruds.' . $lang->name) }})<span class="text-danger">&ast;</span></label><br>
        
        <input type="text" wire:model="title.{{$lang->code}}" class="form-control" placeholder="{{__('cruds.faq_type.fields.title') }}">

        @error('title.'.$lang->code)
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endforeach

    <div class="mb-3">
        <label class="form-label">{{ __('cruds.Status') }}</label>
        <label class="switch">
            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}" {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
            <span class="switch-label" data-on="{{__('cruds.active')}}" data-off="{{__('cruds.deactive')}}"></span>
            <span class="switch-handle"></span>
        </label>

        @error('status')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="modal-footer">
        <div class="hstack gap-2 justify-content-end">
            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="add-btn">

                {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}

            </button>
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>