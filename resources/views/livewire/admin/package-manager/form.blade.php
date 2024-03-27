<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['name'] }}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="package_name" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
        @error('package_name')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['price'] }}<span class="text-danger">&ast;</span></label>
        <input type="number" wire:model="price" class="form-control" placeholder="{{ $allKeysProvider['price'] }}" />
        @error('price')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['audition_fee'] }}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="audition_fee" class="form-control" placeholder="{{ $allKeysProvider['audition_fee'] }}" />
        @error('audition_fee')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['description'] }}<span class="text-danger">&ast;</span></label>
            <textarea id="summernote" rows="4" wire:model="description" class="form-control" placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>
        @error('description')
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