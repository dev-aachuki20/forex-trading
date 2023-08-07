<div class="m-5">
    <div class="live-preview">
        <form wire:submit.prevent="updatePassword">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="password-input" class="form-label">{{$allKeysProvider['old_password']}}</label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group mb-3">
                        <div class="input-form">
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" wire:model="old_password" placeholder="{{$allKeysProvider['old_password']}}" autocomplete="off">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>
                        @error('old_password')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="contactNumber" class="form-label">{{$allKeysProvider['new_password']}}</label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group mb-3">
                        <div class="input-form">
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" wire:model="new_password" placeholder="{{$allKeysProvider['new_password']}}" autocomplete="off">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>
                        @error('new_password')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="meassageInput" class="form-label">{{$allKeysProvider['confirm_password']}}</label>
                </div>
                <div class="col-lg-9">
                    <div class="form-group mb-3">
                        <div class="input-form">
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" wire:model="confirm_password" placeholder="{{$allKeysProvider['confirm_password']}}" autocomplete="off">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>
                        @error('confirm_password')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">{{$allKeysProvider['change_password']}}
                    <span wire:loading wire:target="updatePassword">
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>