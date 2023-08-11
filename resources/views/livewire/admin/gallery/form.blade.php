<div>
    <div class="listjs-table" id="customerList">
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <h4 class="card-title mb-0">
                    {{ $updateMode ? $allKeysProvider['edit'] : $allKeysProvider['add'] }}
                </h4>

            </div>
            <div class="col-sm">
                <div class="d-flex justify-content-sm-end">
                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{$allKeysProvider['back']}}</button>
                </div>
            </div>
        </div>
        <hr>


        <!-- form start -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form mt-5" autocomplete="off">

            <div class="mb-3">
                <label for="customername-field" class="form-label">{{ $allKeysProvider['title'] }}</label>
                <input type="text" wire:model="title" class="form-control" placeholder="{{ $allKeysProvider['title'] }}" />
                @error('title')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- test -->
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
            <!-- test end -->

             <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ $allKeysProvider['image'] }}</label>
                <div class="avatar-xl mx-auto">
                    <input type="file" class="filepond filepond-input-circle" wire:model="image" />
                    @if($updateMode)
                    @if ($originalImage)
                    <img src="{{ $originalImage }}" width="100" height="100">
                    @endif
                    @endif
                </div>
                @error('image')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div> 



            <!-- image  -->
             <!-- <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="form-group mb-0" wire:ignore>
                        <label class="font-weight-bold justify-content-start">Image<i class="fas fa-asterisk"></i></label>
                        <input type="file" wire:model.defer="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg,image/svg">
                        <span wire:loading wire:target="image">
                            <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i> Loading
                        </span>
                    </div>
                    @if($errors->has('image'))
                    <span class="error text-danger">
                        {{ $errors->first('image') }}
                    </span>
                    @endif
                </div>
            </div>  -->

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
        <!-- form end -->

    </div>
</div>