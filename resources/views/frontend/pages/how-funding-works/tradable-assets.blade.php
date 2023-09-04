@extends('layouts.frontend')
@section('title', 'Tradable Assets')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.tradable-assets',['localeid' => $localeid])
@endsection

@section('scripts')
@stop