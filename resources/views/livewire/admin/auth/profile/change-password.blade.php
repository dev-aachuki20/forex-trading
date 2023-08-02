<div class="m-5">
    <div class="live-preview">
        <form wire:submit.prevent="updatePassword">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">Old Password</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model.defer="old_password" class="form-control" placeholder="Enter your old password">
                    @error('old_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="contactNumber" class="form-label">New Password</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model.defer="new_password" class="form-control" placeholder="Enter your new password">
                    @error('new_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="meassageInput" class="form-label">Confirm Password</label>
                </div>
                <div class="col-lg-9">
                    <input type="password" wire:model.defer="confirm_password" class="form-control" placeholder="Enter your confirm password">
                    @error('confirm_password')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
</div>