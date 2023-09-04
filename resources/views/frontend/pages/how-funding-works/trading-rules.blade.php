@extends('layouts.frontend')
@section('title', 'Trading Rules')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.trading-rules',['localeid' => $localeid])
@endsection

@section('scripts')
@stop