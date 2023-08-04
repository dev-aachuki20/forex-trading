<div>
    <div class=" bg-light p-3">
        <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ?getLocalization('update_language'):getLocalization('add_language')}}</h5>
    </div>


    <!-- form start -->
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form mt-5" autocomplete="off">

        <div class="mb-3">
            <label for="customername-field" class="form-label">{{getLocalization('name')}}</label>
            <input type="text" wire:model="language_name" id="customername-field" class="form-control" placeholder="{{getLocalization('name')}}" />
            @error('language_name')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="customername-field1" class="form-label">{{getLocalization('code')}}</label>
            <input type="text" wire:model="language_code" id="customername-field1" class="form-control" placeholder="{{getLocalization('code')}}" />
            @error('language_code')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <img src="" alt="">
        <div class="mb-3">
            <label for="customername-field2" class="form-label">{{getLocalization('image')}}</label>
            <div class="avatar-xl mx-auto">
                <input type="file" class="filepond filepond-input-circle" wire:model="image" data-default-file="{{ $originalImage }}" accept="image/png, image/jpeg, image/gif" />
            </div>
            @error('image')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="customername-field2" class="form-label">{{getLocalization('status')}}</label>
            <label class="switch">
                <input wire:change.prevent="changeStatus({{$status}})" value="{{ $status }}" {{ $status ==1 ? 'checked' : '' }} class="switch-input" type="checkbox" />
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

                    {{ $updateMode ? getLocalization('update_language') : getLocalization('add_language') }}

                </button>
                <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">

                    Cancel

                </button>
            </div>
        </div>

    </form>
    <!-- form end -->
</div>