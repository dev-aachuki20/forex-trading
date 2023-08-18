<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    <div class="mb-3">
        <label for="customername-field" class="form-label">{{$allKeysProvider['name']}}</label>
        <input type="text" wire:model="name" class="form-control" placeholder="{{$allKeysProvider['name']}}" />
        @error('name')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{$allKeysProvider['designation']}}</label>
        <input type="text" wire:model="designation" class="form-control" placeholder="{{$allKeysProvider['designation']}}" />
        @error('designation')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <div wire:ignore>
            <label class="form-label">{{$allKeysProvider['description']}}</label>
            <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{$allKeysProvider['description']}}"></textarea>
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
                <input type="file" id="dropify-image" wire:model="image" class="dropify" data-default-file="{{ $originalImage }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="jpeg png jpg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/jpeg, image/png, image/jpg">
            </div>
        </div>
        @error('image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>


    <!-- originalBrandImage -->
    <!-- brand logo image -->
    <div class="mb-3">
        <div wire:ignore>
            <label for="dropify-brand_image" class="form-label">{{ $allKeysProvider['brand_logo_image'] }}</label>
            <div class="dropzone" id="imageDropzone" ></div>
        </div>
        @error('brand_image')
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
            <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="myButton">
                {{ $updateMode ?  $allKeysProvider['update']  :  $allKeysProvider['submit']  }}
                <span wire:loading wire:target="{{ $updateMode ? 'update' :'store' }}">
                    <!-- <i class="mdi mdi-spin mdi-loading" aria-hidden="true"></i> -->
                    <i class="fa-solid fa-spinner fa-spin" aria-hidden="true"></i>
                </span>
            </button>

            <!-- <i class="mdi mdi-spin-timeout mdi-loading" aria-hidden="true"></i> -->
            <!-- <i class="fa-solid fa-spinner fa-spin" aria-hidden="true"></i> -->

            <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled" class="btn btn-danger" id="add-btn">
                {{ $allKeysProvider['cancel'] }}
            </button>
        </div>
    </div>

</form>

<!-- <div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="dropzone" id="imageDropzone"></div>
        <button type="submit">Upload Images</button>
    </form>
    @foreach ($images as $image)
        <img src="{{ $image->temporaryUrl() }}" alt="Uploaded Image">
    @endforeach
</div>

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2"></script>
    <script>
        Dropzone.options.imageDropzone = {
            paramName: "images", // The name of the input field
            maxFilesize: 2, // MB
            acceptedFiles: 'image/*',
            success: function(file, response) {
                // Handle success, update Livewire component's images array
                @this.images.push({name: response.filename, tmpPath: response.tmp_path});
            }
        };
    </script>
@endpush -->