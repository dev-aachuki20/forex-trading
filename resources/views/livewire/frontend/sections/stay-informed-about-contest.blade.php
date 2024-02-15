<section class="padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Stay Informed About Our Contests.' }}</h2>
                    <div class="discription">
                        <p>{{ $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="form-outer">
                    <form wire:submit.prevent="storeContestInformUserlist">
                        <div class="grid-outer row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group position-relative">
                                    <img class="input-icon" src="{{ asset('images/form-icon/email.svg') }}" alt="email">
                                    <input wire:model="subscriber_email" type="email" placeholder="{{ __('frontend.Enter email address')}}" class="form-control">
                                </div>
                                @error('subscriber_email')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group position-relative" wire:ignore>
                                    <input wire:model="phone_number" type="tel" id="phone">
                                </div>
                                @error('phone_number')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-check">
                            <input wire:model="is_accept" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-jet-gray" for="exampleCheck1">{{__('frontend.I have read & agree to the terms of the SurgeTrader')}} <a href="{{ route('other-page',['pageName' => 'privacy-policy']) }}" class="text-azul">{{__('frontend.Privacy Policy')}}</a> {{__('frontend.and to receive exclusive discounts, promos, and updates from SurgeTrader by SMS and email.*')}}</label>
                        </div>
                        @error('is_accept')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        <div class="button-group justify-content-center">
                            <input type="submit" class="custom-btn outline-color-azul" value="{{__('frontend.submit')}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>