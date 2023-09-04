@extends('layouts.frontend')
@section('title', 'Surge Trader Team')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.aboutus.surgetrader-team',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
