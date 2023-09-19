<!doctype html>
<html lang="{{$locale}}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forex Trading</title>

  @include('partials.frontend.css')

  @livewireStyles

  @stack('styles')
</head>

<body>

  @livewire('frontend.partials.header',['locale' => $locale, 'localeid' => $localeid])

  @yield('content')

  @livewire('frontend.partials.footer',['localeid' => $localeid])



  @include('partials.frontend.js')

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
  <x-livewire-alert::flash />

  @stack('scripts')

</body>

</html>