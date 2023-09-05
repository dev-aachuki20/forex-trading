<div class="live-preview">
    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form" autocomplete="off">
        <div class="row gy-4">

            <!-- name -->
            <div class="col-xxl-3 col-md-4">
                <div>
                    <label class="form-label">{{ $allKeysProvider['name'] }}</label>
                    <input type="text" wire:model="name" class="form-control"
                        placeholder="{{ $allKeysProvider['name'] }}" />
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- designation -->
            <div class="col-xxl-3 col-md-4">
                <div>
                    <label class="form-label">{{ $allKeysProvider['designation'] }}</label>
                    <input type="text" wire:model="designation" class="form-control"
                        placeholder="{{ $allKeysProvider['designation'] }}" />
                    @error('designation')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- type -->
            <div class="col-xxl-3 col-md-4">
                <div>
                    <label for="customername-field1" class="form-label">{{ $allKeysProvider['type'] }}</label><br>
                    <select class="form-control" wire:model="type" wire:change="memberupdatedType">
                        <option value="0">Select</option>
                        @foreach (config('constants.member_types') as $id => $member)
                            <option value="{{ $id }}" {{ $type == $id ? 'selected' : '' }}>
                                {{ ucwords($member) }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- image -->
            <div class="col-xxl-3 col-md-12">
                <div>
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
            </div>

            @if ($teammember)
                <!-- facebook -->
                <div class="col-xxl-3 col-md-6">
                    <div>
                        <label for="customername-field" class="form-label">Facebook Link</label>
                        <input type="text" wire:model="facebook_link" class="form-control"
                            placeholder="Facebook Link" />
                        @error('facebook_link')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- twitter -->
                <div class="col-xxl-3 col-md-6">
                    <div>
                        <label for="customername-field" class="form-label">Twitter Link</label>
                        <input type="text" wire:model="twitter_link" class="form-control"
                            placeholder="Twitter Link" />
                        @error('twitter_link')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- instagram -->
                <div class="col-xxl-3 col-md-6">
                    <div>
                        <label for="customername-field" class="form-label">Instagram Link</label>
                        <input type="text" wire:model="instagram_link" class="form-control"
                            placeholder="Instagram Link" />
                        @error('instagram_link')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- youtube -->
                <div class="col-xxl-3 col-md-6">
                    <div>
                        <label for="customername-field" class="form-label">Youtube Link</label>
                        <input type="text" wire:model="youtube_link" class="form-control"
                            placeholder="Youtube Link" />
                        @error('youtube_link')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- googlePlus -->
                <div class="col-xxl-3 col-md-6">
                    <div>
                        <label for="customername-field" class="form-label">Google Link</label>
                        <input type="text" wire:model="googleplus_link" class="form-control"
                            placeholder="Google Link" />
                        @error('googleplus_link')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            @endif

            @if ($bkmember)
                <!-- description -->
                <div class="col-xxl-3 col-md-12">
                    <div wire:ignore>
                        <label class="form-label">{{ $allKeysProvider['description'] }}</label>
                        <textarea id="summernote" class="form-control" wire:model="description" rows="4"
                            placeholder="{{ $allKeysProvider['description'] }}"></textarea>
                    </div>
                    @error('description')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- originalBrandImage -->
                <!-- brand logo image -->
                <div class="col-xxl-3 col-md-12">
                    <div wire:ignore>
                        <label for="dropify-brand_image"
                            class="form-label">{{ $allKeysProvider['brand_logo_image'] }}</label>
                        <div class="dropzone" id="imageDropzone"></div>
                    </div>
                    @error('brand_image')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            @endif
            <!-- wire:model="brand_image"  -->

            <!-- status -->
            <div class="col-xxl-3 col-md-12">
                <div>
                    <label for="customername-field2" class="form-label">{{ $allKeysProvider['status'] }}</label>
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
            </div>

            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-success" id="myButton">
                        {{ $updateMode ? $allKeysProvider['update'] : $allKeysProvider['submit'] }}
                        <!-- <span wire:loading wire:target="{{ $updateMode ? 'update' : 'store' }}">
                            <i class="fa-solid fa-spinner fa-spin" aria-hidden="true"></i>
                        </span> -->
                    </button>
                    <button wire:click.prevent="cancel" type="submit" wire:loading.attr="disabled"
                        class="btn btn-danger" id="add-btn">
                        {{ $allKeysProvider['cancel'] }}
                    </button>
                </div>
            </div>








        </div>
    </form>
</div>
