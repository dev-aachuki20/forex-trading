<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{$allKeysProvider['reset_password']}} </h5>
                    </div>
                    <div class="p-2 mt-4">
                        <form wire:submit.prevent="submit">

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label for="password" class="form-label">{{$allKeysProvider['password']}}</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" wire:model="password" id="password" placeholder="{{$allKeysProvider['password']}}">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>
                                @error('password')
                                <span class="error text-danger ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label for="password_confirmation" class="form-label">{{$allKeysProvider['confirm_password']}} </label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" wire:model="password_confirmation" id="password_confirmation" placeholder="{{$allKeysProvider['confirm_password']}}">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                <span class="error text-danger ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">{{$allKeysProvider['reset_password']}}
                                    <span wire:loading wire:target="submit">
                                        <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i>
                                    </span>
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
@push('scripts')
<script type="text/javascript">
    document.addEventListener('loadPlugins', function(event) {
        console.log('testing');
        $(document).ready(function() {
            Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(function(e){Array.from(e.querySelectorAll(".password-addon")).forEach(function(r){r.addEventListener("click",function(r){var o=e.querySelector(".password-input");"password"===o.type?o.type="text":o.type="password"})})});
        });
    });
</script>
@endpush