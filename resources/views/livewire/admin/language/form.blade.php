    <div class="listjs-table" id="customerList">
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <h4 class="card-title mb-0">
                    {{ $updateMode ? getLocalization('update_language') : getLocalization('add_language') }}</h4>

            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i
                            class="ri-sub-line align-bottom me-1"></i> -> back</button>
                </div>
            </div>
        </div>
        <hr>
        <!-- form start -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form mt-5"
            autocomplete="off">

            <div class="mb-3">
                <label for="customername-field" class="form-label">{{ getLocalization('name') }}</label>
                <input {{ $updateMode ? 'disabled' : '' }} type="text" wire:model="language_name"
                    id="customername-field" class="form-control" placeholder="{{ getLocalization('name') }}" />
                @error('language_name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="customername-field1" class="form-label">{{ getLocalization('code') }}</label>
                <input {{ $updateMode ? 'disabled' : '' }} type="text" wire:model="language_code"
                    id="customername-field1" class="form-control" placeholder="{{ getLocalization('code') }}" />
                @error('language_code')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <img src="" alt="">
            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ getLocalization('image') }}</label>
                <div class="avatar-xl mx-auto">
                    <input {{ $updateMode ? 'disabled' : '' }}  type="file" class="filepond filepond-input-circle" wire:model="image"
                        data-default-file="{{ $originalImage }}" accept="image/png, image/jpeg, image/gif" />
                </div>
                @error('image')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ getLocalization('status') }}</label>
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

                        {{ $updateMode ? getLocalization('update_language') : getLocalization('add_language') }}

                    </button>
                    <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled"
                        class="btn btn-danger" id="add-btn">

                        Cancel

                    </button>
                </div>
            </div>

        </form>
        <!-- form end -->

    </div>
