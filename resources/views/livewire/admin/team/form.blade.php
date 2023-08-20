<form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">

    <!-- name -->
    <div class="mb-3">
        <label for="customername-field" class="form-label">{{ $allKeysProvider['name'] }}</label>
        <input type="text" wire:model="name" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
        @error('name')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- designation -->
    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{ $allKeysProvider['designation'] }}</label>
        <input type="text" wire:model="designation" class="form-control" placeholder="{{ $allKeysProvider['designation'] }}" />
        @error('designation')
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

    <!-- type -->
    <div class="mb-3">
        <label for="customername-field1" class="form-label">{{ $allKeysProvider['type'] }}</label><br>
        <select class="form-control" wire:model="type" wire:change="memberupdatedType">
            <option value="0">Select</option>
            @foreach (config('constants.member_types') as $member)
            <option value="{{ $loop->iteration }}">{{ ucwords($member)}}</option>
            @endforeach
        </select>
        @error('type')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>


    @if($teammember)
    <!-- icon input -->

    <!-- facebook -->
    <div class="mb-3 mb-2">
        <label for="customername-field" class="form-label">Facebook</label>
        <div class="mb-3">
            <h6 for="customername-field" class="form-label">Link</h6>
            <input type="text" wire:model="facebooklink" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
            @error('facebooklink')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div wire:ignore>
                <h6 class="form-label">{{ $allKeysProvider['image'] }}</h6>
                <div class="mx-auto">
                    <input type="file" id="dropify-facebookicon" wire:model="facebookicon" class="dropify" data-default-file="{{ $originalfacebookIcon }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
                </div>
            </div>
            @error('facebookicon')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- twitter -->
    <div class="mb-3 mb-2">
        <label for="customername-field" class="form-label">Twitter</label>
        <div class="mb-3">
            <h6 for="customername-field" class="form-label">Link</h6>
            <input type="text" wire:model="twitterlink" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
            @error('twitterlink')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div wire:ignore>
                <h6 class="form-label">{{ $allKeysProvider['image'] }}</h6>
                <div class="mx-auto">
                    <input type="file" id="dropify-twittericon" wire:model="twittericon" class="dropify" data-default-file="{{ $originaltwitterIcon }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
                </div>
            </div>
            @error('twittericon')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- instagram -->
    <div class="mb-3 mb-2">
        <label for="customername-field" class="form-label">Instagram</label>
        <div class="mb-3">
            <h6 for="customername-field" class="form-label">Link</h6>
            <input type="text" wire:model="instagramlink" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
            @error('instagramlink')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div wire:ignore>
                <h6 class="form-label">{{ $allKeysProvider['image'] }}</h6>
                <div class="mx-auto">
                    <input type="file" id="dropify-instagramicon" wire:model="instagramicon" class="dropify" data-default-file="{{ $originalinstagramIcon }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
                </div>
            </div>
            @error('instagramicon')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- youtube -->
    <div class="mb-3 mb-2">
        <label for="customername-field" class="form-label">Youtube</label>
        <div class="mb-3">
            <h6 for="customername-field" class="form-label">Link</h6>
            <input type="text" wire:model="youtubelink" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
            @error('youtubelink')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div wire:ignore>
                <h6 class="form-label">{{ $allKeysProvider['image'] }}</h6>
                <div class="mx-auto">
                    <input type="file" id="dropify-youtubeicon" wire:model="youtubeicon" class="dropify" data-default-file="{{ $originalyoutubeIcon }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
                </div>
            </div>
            @error('youtubeicon')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- googlePlus -->
    <div class="mb-3 mb-2">
        <label for="customername-field" class="form-label">Google Plus</label>
        <div class="mb-3">
            <h6 for="customername-field" class="form-label">Link</h6>
            <input type="text" wire:model="googlepluslink" class="form-control" placeholder="{{ $allKeysProvider['name'] }}" />
            @error('googlepluslink')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div wire:ignore>
                <h6 class="form-label">{{ $allKeysProvider['image'] }}</h6>
                <div class="mx-auto">
                    <input type="file" id="dropify-googleplusicon" wire:model="googleplusicon" class="dropify" data-default-file="{{ $originalgoogleplusIcon }}" data-show-loader="true" data-errors-position="outside" data-allowed-file-extensions="svg" data-min-file-size-preview="1M" data-max-file-size-preview="3M" accept="image/svg">
                </div>
            </div>
            @error('googleplusicon')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    @endif

    @if($bkmember)

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
    <!-- originalBrandImage -->
    <!-- brand logo image -->
    <div class="mb-3">
        <div wire:ignore>
            <label for="dropify-brand_image" class="form-label">{{ $allKeysProvider['brand_logo_image'] }}</label>
            <div wire:model="brand_image" class="dropzone" id="imageDropzone"></div>
        </div>
        @error('brand_image')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>
    @endif







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
                {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}
                <span wire:loading wire:target="{{ $updateMode ? 'update' : 'store' }}">
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
{{-- @if ($brand_image)
    <img src="{{ $brand_image }}" alt="Uploaded Image">
@endif --}}