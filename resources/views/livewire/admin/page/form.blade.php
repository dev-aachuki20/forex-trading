<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">


    <!-- title -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{$allKeysProvider['title']}}<span class="text-danger">&ast;</span></label>
        <input type="text" wire:model="states.{{$indexkey}}.title" class="form-control" placeholder="{{$allKeysProvider['title']}}" />
        @error('title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- sub title -->
    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{$allKeysProvider['sub_title']}}<span class="text-danger">&ast;</span></label>
        <input class="form-control" wire:model="states.{{$indexkey}}.sub_title" placeholder="{{$allKeysProvider['sub_title']}}">
        @error('sub_title')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- image -->
    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{ $allKeysProvider['image'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg">
            </div>
        </div>
        @error('image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- status -->
    {{-- <div class="mb-3">
        <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>
        <label class="switch">
            <input wire:change.prevent="changeStatus({{ $status }})" value="{{ $status }}" {{ $status == 1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
            <span class="switch-label" data-on="{{ $statusText }}" data-off="deactive"></span>
            <span class="switch-handle"></span>
        </label>

        @error('status')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div> --}}

</form>