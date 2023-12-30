<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">


    <!-- title -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{$allKeysProvider['name']}}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="name" class="form-control" placeholder="{{$allKeysProvider['name']}}" />
        @error('name')
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