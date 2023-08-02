<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{getLocalization('forgot_password')}}?</h5>
                        <p class="text-muted">Reset password with velzon</p>

                        <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl"></lord-icon>

                    </div>

                    <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                        {{getLocalization('instructions')}}
                    </div>
                    <div class="p-2">
                        <form wire:submit.prevent="submit">
                            <div class="mb-4">
                                <label class="form-label">{{getLocalization('email')}}</label>
                                <input type="email" wire:model="email" class="form-control" id="email" placeholder="{{getLocalization('email')}}">
                                @error('email') <span class="error text-danger"> {{$message}} </span> @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-success w-100" type="submit">{{getLocalization('send_reset_link')}}</button>
                                <span wire:loading wire:target="submit">
                                    <i class="fa fa-solid fa-spinner fa-spin" aria-hidden="true"></i>
                                </span>
                            </div>
                        </form><!-- end form -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">{{getLocalization('remember_password')}}<a href="{{ route('auth.admin.login') }}" class="fw-semibold text-primary text-decoration-underline">{{getLocalization('click_here')}} </a> </p>
            </div>

        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>

<!-- end auth-page-wrapper -->
</div>