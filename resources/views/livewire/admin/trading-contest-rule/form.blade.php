<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">
    <!-- instruction  -->
    {{-- <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['instruction'] }}</label>
    <input type="text" wire:model="instruction" class="form-control" placeholder="{{ $allKeysProvider['instruction'] }}" />
    @error('instruction')
    <span class="error text-danger">{{ $message }}</span>
    @enderror
    </div> --}}

    <!-- rules -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">Rule<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="title" class="form-control" placeholder="{{ $allKeysProvider['title'] }}" />
        @error('title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- description -->
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['description'] }}<span class="text-danger">&ast;</span></label>
            <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>
        @error('description')
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