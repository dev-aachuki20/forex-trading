<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    <!-- winner place title -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['title'] }}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="title" class="form-control" placeholder="{{ $allKeysProvider['title'] }}" />
        @error('title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- position -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">@lang('frontend.position')<span class="text-danger">&ast;</span></label>
        <input type="number" wire:model="position" class="form-control" placeholder="@lang('frontend.position')" />
        @error('position')
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