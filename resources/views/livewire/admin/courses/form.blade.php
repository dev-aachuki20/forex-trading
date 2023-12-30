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
            <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{ $allKeysProvider['description'] }}"></textarea>
        </div>
        @error('description')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- image -->
    {{-- <div class="mb-3">
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

    <!-- video -->
    <div class="mb-3">
        <div wire:ignore>
            <label for="customername-field2" class="form-label">{{ $allKeysProvider['video'] }}</label>
            <div class="mx-auto">
                <input type="file" id="dropify-video" wire:model="video" class="dropify" data-default-file="{{ $originalVideo }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="webm mp4 avi wmv flv mov" data-min-file-size-preview="1M" data-max-file-size-preview="3M" data-max-file-size="{{ config('constants.data_max_file_size') }}" accept="video/webm, video/mp4, video/avi,video/wmv,video/flv,video/mov">
            </div>
        </div>
        @error('video')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div> --}}


    <!-- image and video start -->
    <div class="row logo-section">
        <div class="col-md-6 mb-4 image-section">
            <div class="card" wire:ignore wire:key="image-upload-key">
                <div class="card-header text-center">
                    <h5>Upload Image File</h5>
                </div>

                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button type="button" id="browseImageFile" class="btn btn-primary">Browse File</button>
                    </div>
                    <div style="display: none" class="progress mt-3 progress-image" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar-image" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                </div>

                @if(!is_null($originalImage))
                <div class="card-footer p-4" style="display: block">
                    <div class="imglayer_box">
                        <img id="imagePreview" src="{{$originalImage}}" style="width: 100%; height: auto; display: block" alt="img" />
                    </div>
                </div>
                @else
                <div class="card-footer p-4" style="display: none">
                    <div class="imglayer_box">
                        <img id="imagePreview" src="" style="width: 100%; height: auto; display: none" alt="img" />
                    </div>
                </div>
                @endif

            </div>

            @if($errors->has('image'))
            <span class="error text-danger">
                {{ $errors->first('image') }}
            </span>
            @endif
        </div>

        {{-- <div class="col-md-6 mb-4 video-section">
            <div class="card" wire:ignore wire:key="video-upload-key">
                <div class="card-header text-center">
                    <h5>Upload Video File</h5>
                </div>

                <div class="card-body">
                    <div id="upload-container" class="text-center">
                        <button type="button" id="browseVideoFile" class="btn btn-primary">Browse File</button>
                    </div>
                    <div style="display: none" class="progress mt-3 progress-video" style="height: 25px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" id="progress-bar-video" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                    </div>
                </div>

                @if(!is_null($originalVideo))
                <div class="card-footer p-4">
                    <video class="videolayer_box" id="videoPreview" src="{{$originalVideo}}" controls style="width: 100%; height: auto;" autoplay></video>
    </div>
    @else
    <div class="card-footer p-4" style="display: none">
        <video class="videolayer_box" id="videoPreview" src="" controls style="width: 100%; height: auto; display: none"></video>
    </div>
    @endif

    </div>

    @if($errors->has('video'))
    <span class="error text-danger">
        {{ $errors->first('video') }}
    </span>
    @endif
    </div> --}}
    </div>
    <!-- end of image and video start -->


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

                {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}

            </button>
            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>