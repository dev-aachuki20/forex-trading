<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">


    <!-- name -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['name'] }}</label>
        <input type="text" wire:model="name" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
        @error('name')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- description -->
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['description'] }}</label>
            <textarea id="summernote" class="form-control" wire:model="description" rows="4"
                placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>
        @error('description')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- image -->
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['image'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image" wire:model="image" class="dropify"
                    data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside"
                    data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M"
                    accept="image/svg">
            </div>
        </div>
        @error('image')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- video -->
    <div class="mb-3">
        <div wire:ignore>
            <label for="customername-field2" class="form-label">{{ $allKeysProvider['video'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-video" wire:model="video" class="dropify"
                    data-default-file="{{ $originalVideo }}" data-show-loader="true" data-errors-position="outside"
                    data-allowed-file-extensions="webm mp4 avi wmv flv mov" data-min-file-size-preview="1M"
                    data-max-file-size-preview="3M" data-max-file-size="{{ config('constants.data_max_file_size') }}"
                    accept="video/webm, video/mp4, video/avi,video/wmv,video/flv,video/mov">
            </div>
        </div>
        @error('video')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- status -->
    <div class="mb-3">
        <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>
        <label class="switch">
            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}"
                {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
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
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger"
                id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>
