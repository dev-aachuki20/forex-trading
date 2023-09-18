<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    <div class="mb-3">
        <label for="customername-field" class="form-label">{{$allKeysProvider['name']}}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="name" class="form-control" placeholder="{{$allKeysProvider['name']}}" />
        @error('name')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{$allKeysProvider['designation']}}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="designation" class="form-control" placeholder="{{$allKeysProvider['designation']}}" />
        @error('designation')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{$allKeysProvider['company_name']}}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="company_name" class="form-control" placeholder="{{$allKeysProvider['company_name']}}" />
        @error('company_name')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <div wire:ignore>

            <label class="form-label">{{ $allKeysProvider['description'] }}<span class="text-danger">&ast;</span></label>

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

                    data-default-file="{{ $originalImage }}" data-show-loader="true"

                    data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg"

                    data-min-file-size-preview="1M" data-max-file-size-preview="3M"

                    accept="image/jpeg, image/png, image/jpg">
            </div>
        </div>
        @error('image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- rating -->
    <div class="mb-3">
        <label for="customername-field2" class="form-label">{{ $allKeysProvider['rating'] }}<span class="text-danger">&ast;</span></label>
        <input type="number" min="1" max="5" wire:model="rating" class="form-control" placeholder="{{$allKeysProvider['rating']}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight','Tab'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space' && this.value.length < 1 " step="1" autocomplete="off" />

        @error('rating')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- status -->
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

                {{ $updateMode ?  $allKeysProvider['update']  :  $allKeysProvider['submit']  }}

            </button>
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>