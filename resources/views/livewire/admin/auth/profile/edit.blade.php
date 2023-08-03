<div class="m-5">
    <div class="live-preview">
        <form wire:submit.prevent="updateProfile">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">{{getLocalization('first_name')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" wire:model="first_name" class="form-control" placeholder="{{getLocalization('first_name')}}">
                    @error('first_name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">{{getLocalization('last_name')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" wire:model="last_name" class="form-control" placeholder="{{getLocalization('last_name')}}">
                    @error('last_name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">{{getLocalization('email')}}</label>
                </div>
                <div class="col-lg-9">
                    <input disabled type="email" wire:model="email" class="form-control" placeholder="{{getLocalization('email')}}">
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="meassageInput" class="form-label">{{getLocalization('phone_number')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" wire:model="mobile" class="form-control" placeholder="{{getLocalization('phone_number')}}">
                    @error('mobile')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">{{getLocalization('update_profile')}}
                    <span wire:loading wire:target="updateProfile">
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>