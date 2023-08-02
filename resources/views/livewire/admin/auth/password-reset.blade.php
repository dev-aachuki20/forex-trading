<div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">{{getLocalization('reset_password')}} </h5>
                    </div>
                    <div class="p-2 mt-4">
                        <form wire:submit.prevent="submit">

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label for="password" class="form-label">{{getLocalization('password')}}</label>
                                    <input type="password" class="form-control" wire:model="password" id="password" placeholder="{{getLocalization('password')}}">
                                </div>
                                @error('password')
                                <span class="error text-danger ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="input-form">
                                    <label for="password" class="form-label">{{getLocalization('confirm_password')}} </label>
                                    <input type="password" class="form-control" wire:model="password_confirmation" id="password_confirmation" placeholder="{{getLocalization('confirm_password')}}">
                                </div>
                                @error('password_confirmation')
                                <span class="error text-danger ">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">{{getLocalization('reset_password')}}
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