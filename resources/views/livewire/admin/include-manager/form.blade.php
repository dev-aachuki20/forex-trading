<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['title'] }}</label>
        <input type="text" wire:model="title" class="form-control" placeholder="{{ $allKeysProvider['title'] }}" />
        @error('title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>



    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['description'] }}</label>
            <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>
        @error('description')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['image'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
            </div>
        </div>
        @error('image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>
        <label class="switch">
            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}" {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
            <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
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