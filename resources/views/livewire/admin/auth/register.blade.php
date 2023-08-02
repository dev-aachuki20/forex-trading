<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{getLocalization('create_new_account')}}</h5>
                        <p class="text-muted">{{getLocalization('free_account')}}</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form class="needs-validation" novalidate wire:submit.prevent="register">

                            <div class="mb-3">
                                <label for="firstname" class="form-label">{{getLocalization('first_name')}} <span class="text-danger">*</span></label>
                                <input type="text" wire:model='firstname' class="form-control" id="firstname" placeholder="{{getLocalization('first_name')}}">
                                @error('firstname') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">{{getLocalization('last_name')}} <span class="text-danger">*</span></label>
                                <input type="text" wire:model='lastname' class="form-control" id="lastname" placeholder="{{getLocalization('last_name')}}">
                                @error('lastname') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>
                            <div class="mb-3">
                                <label for="useremail" class="form-label">{{getLocalization('email')}} <span class="text-danger">*</span></label>
                                <input type="email" wire:model='useremail' class="form-control" id="useremail" placeholder="{{getLocalization('email')}}">
                                @error('useremail') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password-input">{{getLocalization('password')}}</label>
                                <input type="password" wire:model='password' class="form-control pe-5 password-input" onpaste="return false" placeholder="{{getLocalization('password')}}" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                @error('password') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>


                            <div class="mb-3">
                                <label for="phone" class="form-label">{{getLocalization('phone_number')}} <span class="text-danger">*</span></label>
                                <input type="text" wire:model='phone' class="form-control" id="phone" placeholder="{{getLocalization('phone_number')}}" required>
                                @error('phone') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">{{getLocalization('dob')}} <span class="text-danger">*</span></label>
                                <input type="date" wire:model='dob' class="form-control" id="dob" placeholder="{{getLocalization('dob')}}">
                                @error('dob') <span class="error text-danger">{{ $message }}</span>@enderror

                            </div>

                            <!-- <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-control" wire:model.defer='gender'>
                                                <option value="">Select Gender</option>
                                            </select>
                                        </div> -->

                            <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                <h5 class="fs-13">Password must contain:</h5>
                                <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">{{getLocalization('sign_up')}}</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">{{getLocalization('have_account')}} <a href="{{route('auth.admin.login')}}" class="fw-semibold text-primary text-decoration-underline"> {{getLocalization('signin')}} </a> </p>
            </div>

        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end auth page content -->

<!-- end auth-page-wrapper -->
</div>