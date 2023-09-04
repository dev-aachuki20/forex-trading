@extends('layouts.frontend')
@section('title', 'Traders Corner Blog')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.resources.traders-corner-blog',['localeid' => $localeid])
@endsection

@section('scripts')
@stop