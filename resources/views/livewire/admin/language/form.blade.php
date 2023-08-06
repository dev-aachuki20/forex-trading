<div>
    <!-- dropzon -->
    <!-- <div class="dropzone">
     <div class="fallback">
         <input name="file" type="file" multiple="multiple">
     </div>
     <div class="dz-message needsclick">
         <div class="mb-3">
             <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
         </div>

         <h4>Drop files here or click to upload.</h4>
     </div>
 </div>

 <ul class="list-unstyled mb-0" id="dropzone-preview">
     <li class="mt-2" id="dropzone-preview-list">
         <div class="border rounded">
             <div class="d-flex p-2">
                 <div class="flex-shrink-0 me-3">
                     <div class="avatar-sm bg-light rounded">
                         <img data-dz-thumbnail class="img-fluid rounded d-block" src="../png/new-document.png" alt="Dropzone-Image" />
                     </div>
                 </div>
                 <div class="flex-grow-1">
                     <div class="pt-1">
                         <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                         <p class="fs-13 text-muted mb-0" data-dz-size></p>
                         <strong class="error text-danger" data-dz-errormessage></strong>
                     </div>
                 </div>
                 <div class="flex-shrink-0 ms-3">
                     <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                 </div>
             </div>
         </div>
     </li>
 </ul> -->
    <!-- dropzon -->

    <div class="listjs-table" id="customerList">
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <h4 class="card-title mb-0">
                    {{ $updateMode ? getLocalization('update_language') : getLocalization('add_language') }}
                </h4>

            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i
                            class="ri-arrow-left-line"></i> back</button>
                </div>
            </div>
        </div>
        <hr>


        <!-- form start -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form mt-5"
            autocomplete="off">

            <div class="mb-3">
                <label for="customername-field" class="form-label">{{ getLocalization('name') }}</label>
                <input type="text" wire:model="language_name" id="customername-field" class="form-control"
                    placeholder="{{ getLocalization('name') }}" />
                @error('language_name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="customername-field1" class="form-label">{{ getLocalization('code') }}</label>
                <input type="text" wire:model="language_code" id="customername-field1" class="form-control"
                    placeholder="{{ getLocalization('code') }}" />
                @error('language_code')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ getLocalization('image') }}</label>
                <div class="avatar-xl mx-auto">
                    <input type="file" class="filepond filepond-input-circle" wire:model="image" />
                    @if ($originalImage)
                        <img src="{{ $originalImage }}" width="200" height="259">
                    @endif
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
</div>
