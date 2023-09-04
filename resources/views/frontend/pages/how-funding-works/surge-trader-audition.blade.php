@extends('layouts.frontend')
@section('title', 'Surge Trader Audition')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.how-funding-works.surge-trader-audition',['localeid' => $localeid])
@endsection

@section('scripts')
@stop
