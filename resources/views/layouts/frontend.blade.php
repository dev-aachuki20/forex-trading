<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forex Trading</title>

    @include('partials.frontend.css')
    @livewireStyles

    @stack('styles')
</head>

<body>

    @livewire('frontend.partials.header')
    
    @yield('content')

    @livewire('frontend.partials.footer')

    <!-- model onload -->
    <div class="modal fade sel-buy-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="sel-buy-top-img">
                        <img src="images/bulls.svg" alt="bulls">
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
                <!-- <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div> -->
            </div>
        </div>
    </div>
    <!-- <a class="custom-btn fill-btn">kamal</a> -->


    @include('partials.frontend.js')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> -->
    <x-livewire-alert::flash />

    @stack('scripts')

</body>

</html>