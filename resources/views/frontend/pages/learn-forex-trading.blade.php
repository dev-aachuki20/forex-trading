@extends('layouts.frontend')
@section('title', 'Learn Forex Trading')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.learn-forex-trading',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
