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
                <label for="customername-field1" class="form-label">{{$allKeysProvider['description']}}</label>
                <textarea class="form-control" wire:model="description" id="" cols="30" rows="10" placeholder="{{$allKeysProvider['description']}}"></textarea>
                @error('description')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- image -->
            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ $allKeysProvider['image'] }}</label>
                <div class="avatar-xl mx-auto">
                    <input type="file" class="filepond filepond-input-circle" wire:model="image" />
                    @if ($originalImage)
                    <img src="{{ $originalImage }}" width="100" height="100">
                    @endif
                </div>
                @error('image')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- brand logo image -->
            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ $allKeysProvider['brand_logo_image'] }}</label>
                <div class="avatar-xl mx-auto">
                    <input type="file" class="filepond filepond-input-circle" wire:model="brand_image" multiple />

                </div>
                <div class="row">
                    @if ($originalBrandImage)
                    @foreach($originalBrandImage as $brandImage)
                    <div class="col-md-2">
                        <img src="{{ $brandImage }}" width="100" height="100">
                    </div>
                    @endforeach
                    @endif
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
        <!-- form end -->

    </div>
</div>