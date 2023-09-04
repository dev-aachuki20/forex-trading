@extends('layouts.frontend')
@section('title', 'Contact Us')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.aboutus.contact-us',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
