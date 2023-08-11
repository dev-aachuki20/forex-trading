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
                <label for="customername-field1" class="form-label">{{$allKeysProvider['company_name']}}</label>
                <input type="text" wire:model="company_name" class="form-control" placeholder="{{$allKeysProvider['company_name']}}" />
                @error('company_name')
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

            <!-- rating -->
            <div class="mb-3">
                <label for="customername-field2" class="form-label">{{ $allKeysProvider['rating'] }}</label>
                <input type="number" min="1" max="5" wire:model="rating" class="form-control" placeholder="{{$allKeysProvider['rating']}}" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight','Tab'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space' && this.value.length < 1 " step="1" autocomplete="off"/>

                @error('rating')
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