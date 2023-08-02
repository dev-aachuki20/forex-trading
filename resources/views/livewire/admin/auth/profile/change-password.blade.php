<div class="m-5">
    <div class="live-preview">
        <form wire:submit.prevent="updatePassword">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">{{getLocalization('old_password')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model="old_password" class="form-control" placeholder="{{getLocalization('old_password')}}">
                    @error('old_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="contactNumber" class="form-label">{{getLocalization('new_password')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model="new_password" class="form-control" placeholder="{{getLocalization('new_password')}}">
                    @error('new_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="meassageInput" class="form-label">{{getLocalization('confirm_password')}}</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model="confirm_password" class="form-control" placeholder="{{getLocalization('confirm_password')}}">
                    @error('confirm_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{getLocalization('change_password')}}</button>
            </div>
        </form>
    </div>
</div>