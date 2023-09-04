@extends('layouts.frontend')
@section('title', 'About Surge Trader')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.aboutus.about-surgetrader',['localeid' => $localeid])
@endsection

@section('scripts')
@stop

