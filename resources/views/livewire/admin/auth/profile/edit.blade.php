<div class="m-5">
    <div class="live-preview">
        <form wire:submit.prevent="updateProfile">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">First Name</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" wire:model="first_name" class="form-control">
                    @error('first_name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">Last Name</label>
                </div>
                <div class="col-lg-9">
                    <input type="text" wire:model="last_name" class="form-control">
                    @error('last_name')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label class="form-label">Email</label>
                </div>
                <div class="col-lg-9">
                    <input disabled type="email" wire:model="email" class="form-control">
                    @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="meassageInput" class="form-label">Mobile Number</label>
                </div>
                <div class="col-lg-9">
                    <input type="number" wire:model="mobile" class="form-control">
                    @error('mobile')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>