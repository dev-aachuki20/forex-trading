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
                    <button wire:click.prevent="cancel" type="button" class="btn btn-success add-btn"><i class="ri-arrow-left-line"></i> {{ $allKeysProvider['back'] }}</button>
                </div>
            </div>
        </div>
        <hr>


        <!-- form start -->
        <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="tablelist-form mt-5" autocomplete="off">
            <div class="mb-3">
                <label for="customername-field1" class="form-label">{{ $allKeysProvider['type'] }}</label><br>
                <select class="form-control" wire:model="type">
                    <option value="0">Select</option>
                    <option value="1">{{ ucwords(config('constants.faq_types.1')) }}</option>
                    <option value="3">{{ ucwords(config('constants.faq_types.3')) }}</option>
                    <option value="2">{{ ucwords(config('constants.faq_types.2')) }}</option>
                    <option value="4">{{ ucwords(config('constants.faq_types.4')) }}</option>
                    <option value="5">{{ ucwords(config('constants.faq_types.5')) }}</option>
                    <option value="6">{{ ucwords(config('constants.faq_types.6')) }}</option>
                </select>
                @error('type')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="customername-field" class="form-label">{{ $allKeysProvider['question'] }}</label>
                <input type="text" wire:model="question" class="form-control" placeholder="{{ $allKeysProvider['question'] }}" />
                @error('question')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>



            <div class="mb-3">
                <div wire:ignore>
                    <label class="form-label">{{ $allKeysProvider['answer'] }}</label>
                    <textarea id="summernote" class="form-control" wire:model="answer" rows="4" placeholder="{{ $allKeysProvider['answer'] }}"></textarea>
                </div>
                @error('answer')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

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
            </div>

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
        <!-- form end -->

    </div>
</div>