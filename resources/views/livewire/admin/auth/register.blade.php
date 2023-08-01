<div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free velzon account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate wire:submit.prevent="register">

                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" wire:model.defer = 'firstname' class="form-control" id="firstname" placeholder="Enter Your First Name" required>
                                            <div class="invalid-feedback">
                                            Enter Your First Name
                                            </div>
                                            @error('firstname') <span class="error text-danger">{{ $message }}</span>@enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" wire:model.defer = 'lastname' class="form-control" id="lastname" placeholder="Enter Your Last Name" required>
                                            <div class="invalid-feedback">
                                            Enter Your Last Name
                                            </div>
                                            @error('lastname') <span class="error text-danger">{{ $message }}</span>@enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" wire:model.defer = 'useremail' class="form-control" id="useremail" placeholder="Enter Your Email" required>
                                            <div class="invalid-feedback">
                                               Enter Your Email 
                                            </div>
                                            @error('useremail') <span class="error text-danger">{{ $message }}</span>@enderror

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" wire:model.defer = 'password' class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter Your Password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                <div class="invalid-feedback">
                                                   Enter Your Password
                                                </div>
                                            </div>
                                            @error('password') <span class="error text-danger">{{ $message }}</span>@enderror

                                        </div>


                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" wire:model.defer = 'phone' class="form-control" id="phone" placeholder="Enter Your Phone Number" required>
                                            <div class="invalid-feedback">
                                                Enter Your Phone Number
                                            </div>
                                            @error('phone') <span class="error text-danger">{{ $message }}</span>@enderror

                                        </div>

                                        <div class="mb-3">
                                            <label for="dob" class="form-label">DOB <span class="text-danger">*</span></label>
                                            <input type="date" wire:model.defer = 'dob' class="form-control" id="dob" placeholder="Enter DOB" required>
                                            <div class="invalid-feedback">
                                                DOB
                                            </div>
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
                                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{route('auth.admin.login')}}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
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