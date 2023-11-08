@extends('layouts.frontend')
@section('title', 'Home')

@section('styles')
@stop

@section('content')

<!-- home banner -->
@livewire('frontend.sections.home-banner', ['localeid' => $localeid])
<!-- package -->
@livewire('frontend.sections.package', ['localeid' => $localeid])
<!-- our company work -->
@livewire('frontend.sections.our-company-work', ['localeid' => $localeid])
<!-- partners -->
@livewire('frontend.sections.partners', ['localeid' => $localeid])
<!-- over the weekend -->
@livewire('frontend.sections.over-the-weekend', ['localeid' => $localeid])
<!-- over the weekend two-->
@livewire('frontend.sections.over-the-weekend-two', ['localeid' => $localeid])
<!-- why we different-->
@livewire('frontend.sections.why-we-different', ['localeid' => $localeid])
<!-- Trader Portal-->
@livewire('frontend.sections.trader-portal', ['localeid' => $localeid])
<!-- earn-more-trading-activity'-->
@livewire('frontend.sections.earn-more-trading-activity', ['localeid' => $localeid])
<!-- testimonial -->
@livewire('frontend.sections.testimonial', ['localeid' => $localeid])

<!-- WhyTradeWithUs -->
@livewire('frontend.sections.Whytradewithus', ['localeid' => $localeid])



<!-- model onload -->
{{-- <div class="modal fade sel-buy-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-head">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="sel-buy-top-img">
                    <img src="{{ asset('images/bulls.svg') }}" alt="bulls">
                </div>
                <div class="sel-buy-main-text bg-azul text-center text-white">
                    <h2 class="text-white">Surge Trading</h2>
                    <div class="discription">
                        <p>70% of your visitors do exactly what you just did and never come back!</p>
                    </div>
                    <div class="divider"></div>
                    <h3>Keep Them on Your site longer with</h3>
                    <div class="bg-img-main"> Surgetrader</div>
                    <div class="button-group justify-content-center">
                        <a href="#" class="custom-btn outline-color-white">Claim Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('scripts')
@stop