<div class="m-5 p-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">                
                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{ trans('global.change_password') }}</h5>
                        <p class="text-muted">Your new password must be different from previous used password.</p>
                    </div>

                    <div class="p-2">
                        <form wire:submit.prevent="updatePassword">
                            <div class="mb-3">
                                <label class="form-label" for="old-password-input">Old Password</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input"
                                        wire:model.defer="old_password" placeholder="Enter old password"
                                        id="password-input" aria-describedby="passwordInput">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i
                                            class="ri-eye-fill align-middle"></i></button>
                                </div>
                                {{-- <div id="passwordInput" class="form-text">Must be at least 8 characters.</div> --}}
                                @error('old_password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="password-input">New Password</label>
                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input"
                                        wire:model.defer="new_password" placeholder="Enter password" id="password-input"
                                        aria-describedby="passwordInput">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i
                                            class="ri-eye-fill align-middle"></i></button>
                                </div>
                                {{-- <div id="passwordInput" class="form-text">Must be at least 8 characters.</div> --}}
                                @error('new_password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="confirm-password-input">Confirm Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input"
                                        wire:model.defer="confirm_password" placeholder="Confirm password">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="confirm-password-input"><i
                                            class="ri-eye-fill align-middle"></i></button>
                                </div>
                                @error('confirm_password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Change Password</button>
                                {{-- <button class="btn btn-success w-100" type="submit">Reset Password</button> --}}
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            {{-- <div class="mt-4 text-center">
                <p class="mb-0">Wait, I remember my password... <a href="auth-signin-basic.html"
                        class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
            </div> --}}

        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end auth page content -->
</div>
