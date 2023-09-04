@extends('layouts.frontend')
@section('title', 'Trader Resources')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.resources.traders-resources',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
