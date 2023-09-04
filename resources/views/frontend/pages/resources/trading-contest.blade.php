@extends('layouts.frontend')
@section('title', 'Trading Contest')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.resources.trading-contest',['localeid' => $localeid])
@endsection

@section('scripts')
@stop