<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{$allKeysProvider['welcome_back']}}</h5>
                        <p class="text-muted">{{$allKeysProvider['Signin_to_comtinue']}}</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form wire:submit.prevent="login">

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label for="email" class="form-label">{{$allKeysProvider['email']}}</label>
                                    <input type="text" class="form-control" wire:model="email" id="email" placeholder="{{$allKeysProvider['email']}}">
                                </div>
                                @error('email')
                                <span class="error text-danger ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label class="form-label" for="password-input">{{$allKeysProvider['password']}}</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" wire:model="password" placeholder="{{$allKeysProvider['password']}}" id="password-input" autocomplete="off">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" tabindex="-1"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <div class="float-end my-2">
                                        <a href="{{route('auth.admin.forget-password')}}" class="text-muted" tabindex="-1">{{$allKeysProvider['forgot_password']}}?</a>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="remember_me"
                                    value="" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                            </div> --}}
                            <i class="fa-solid fa-house"></i>
                            <div class="mt-4">
                                <button type="button" class="btn btn-success w-100"  wire:click="login" wire:loading.attr="disabled">
                                {{$allKeysProvider['sign_in']}}
                                    <!-- <span wire:loading wire:target="update">
                                        <i class="ri-loader-2-line" aria-hidden="true"></i>
                                    </span> -->
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
</div>