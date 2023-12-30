@extends('layouts.frontend')
@section('title', 'Learn Forex Trading Detail Page')

@section('styles')
@stop

@section('content')
@livewire('frontend.pages.learn-forex-trading-detail',['localeid' => $localeid, 'courseid'=> $courseid])
@endsection

@section('scripts')
@stop