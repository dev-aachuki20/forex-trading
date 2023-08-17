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


            <!-- title -->
            <div class="mb-3">
                <label for="customername-field" class="form-label">{{$allKeysProvider['title']}}</label>
                <input type="text" wire:model="title" class="form-control" placeholder="{{$allKeysProvider['title']}}" />
                @error('title')
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

            <!-- publish date -->
            <div class="mb-3">
                <div wire:ignore>
                    <label for="to-date" class="form-label">{{$allKeysProvider['publish_date']}}</label>
                    <input id="to-date" type="text" class="form-control" wire:model="publish_date" placeholder="{{$allKeysProvider['publish_date']}}" autocomplete="off" />
                </div>
                @error('publish_date')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- description -->
            <div class="mb-3">
                <div wire:ignore>
                    <label class="form-label">{{$allKeysProvider['description']}}</label>
                    <textarea id="summernote" class="form-control" wire:model="description" rows="4" placeholder="{{$allKeysProvider['description']}}"></textarea>
                </div>
                @error('description')
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